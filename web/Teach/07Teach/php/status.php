<?php //Session file
 session_start(); 

 $time = $_SERVER['REQUEST_TIME'];

//Set a 30 minute expiration on our login
 $timeout_duration = 1800;
 if (isset($_SESSION['LAST_ACTIVITY']) && 
    ($time - $_SESSION['LAST_ACTIVITY']) > $timeout_duration) {
     session_unset();
     session_destroy();
     session_start();
 }
 $_SESSION['LAST_ACTIVITY'] = $time;
 
$user = $pass = $loginErr = $pass2 = $userErr = $passErr = "";

 if(count($_POST) != 0)
 {
    //Check our inputs
    if (empty($_POST["user"])) {
        $nameErr = "Name is required";
      } else if(isset($_POST["pass2"])) {
        $user = clear_data($_POST["user"]);
        if (!preg_match("/^[a-zA-Z-_'1-9]*$/",$user)) {
          $userErr = "Only letters and numbers allowed";
        }
      }

    if (empty($_POST["pass"])) {
        $passErr = "Password is required";
    } else if(isset($_POST["pass"])) {
        $pass = clear_data($_POST["pass"]);
        if (!preg_match("^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\W])(?=\S*[\d])\S*$",$pass)) {
        $passErr = "Minimum eight characters, at least one uppercase letter, one lowercase letter, one number and one special character required!";
        }
    }

    $action = clear_data($_POST['action']);
    if($action == "login" && $nameErr == "" && $passErr == "")
    {
        //Get login info
        if(
            $rows = $db->query('SELECT 
            a.username,
            a.stored_hash
        FROM
            admins a
        WHERE
            username = \''. $user .'\';'))
            {
                $details = $rows->fetch(PDO::FETCH_ASSOC);
            }
        //Set Status
        if(password_verify($pass, $details['stored_hash']))
        {
            $_SESSION["logged"] = true;
            $_SESSION["username"] = $user;
            $user = $pass = $loginErr = $pass2 = $passErr = "";
        }
        else
        {
            $loginErr = "Incorrect user ID or password. Type the correct user ID and password, and try again.";
        }
    }
    else if ($action == "create")
    {
        if (isset($_POST["pass2"]) && empty($_POST["pass"]) || empty($_POST["pass2"])) {
            $passErr = "Password fields cannot be blank";
        } else if (clear_data($_POST["pass"]) != clear_data($_POST["pass2"]))
        {
            $passErr = "Passwords must match!";
        }

        $pass2 = clear_data($_POST['pass2']);

        if($nameErr == "" && $passErr == "")
        {
            if($pass == $pass2)
            {
                $hash2Save = password_hash($pass, PASSWORD_DEFAULT);
    
                try{
                    if(
                    $success = $db->query('INSERT INTO admins 
                        (username, stored_hash)
                    VALUES 
                        (\''. $user .'\', \''. $hash2Save .'\');'))
                    {                    
                        $_SESSION["logged"] = true;
                        $_SESSION["username"] = $user;
                        $user = $pass = $loginErr = $pass2 = $passErr = "";
                    }
                    header('Location: signin.php');
                }
                catch (Exception $e)
                {
                    $loginErr == "Username already exists please try again";
                }
            }
            else
            {
                $loginErr = "Your creation attempt has been denied.";
            }
        }        
    }
    else if ($action == "logout")
    {
        session_unset();
        session_destroy();
        session_start();
    }
 }
 else
 {
    if(isset($_SESSION['logged']) && $_SESSION['logged'])
    {
        $loggedIn = true;
    }
 }
    
    //Function for clearing inputs for code injections
    function clear_data($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
 ?>