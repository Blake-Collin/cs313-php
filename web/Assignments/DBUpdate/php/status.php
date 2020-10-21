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
 
$user = $pass = $loginErr = $pass2 = $cPass = "";

 if(count($_POST) != 0)
 {
    $action = clear_data($_POST['action']);
    if($action == "login")
    {
        //Get User input
        $user = clear_data($_POST['user']);
        $pass = clear_data($_POST['pass']);

        //Get login info
        if(
            $rows = $db->query('SELECT 
            a.username,
            a.hash,
            a.salt
        FROM
            admins a
        WHERE
            a.username = '. $username .';'))
            {
                $details = $rows->fetch(PDO::FETCH_ASSOC);
            }
        //Set Status
        if(password_verify($hash, $details['stored_hash']))
        {
            $_SESSION["logged"] = true;
            $_SESSION["username"] = $user;
        }
        else
        {
            $loginErr = "Incorrect user ID or password. Type the correct user ID and password, and try again.";
        }
        
    }
    else if ($action == "create")
    {
        $user = clear_data($_POST['user']);
        $pass1 = clear_data($_POST['pass1']);
        $pass2 = clear_data($_POST['pass2']);
        $cPass = clear_data($_POST['cPass']);

        if($cPass == "onmyhonor" && $pass1 == $pass2)
        {
            $hash2Save = password_hash($pass1, PASSWORD_DEFAULT);
            if(
                $success = $db->query('INSERT INTO admins 
                    (username, stored_hash)
                VALUES 
                    ('. $user .','. $hash2Save .');'))
                {                    
                    $_SESSION["logged"] = true;
                    $_SESSION["username"] = $user;
                }
                else
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