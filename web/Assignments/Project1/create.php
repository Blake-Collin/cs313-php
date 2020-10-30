<?php 
include('./php/database.php');
include('./php/status.php');
include('./php/cartstatus.php');
?>

<!DOCTYPE html>
<html lang="en">
<?php $title = 'Administrator Creation'; ?>
<?php $desc = 'Create Admin for the site if you are an admin.'; ?>
<?php $currentPage = 'creation'; ?>
<?php include('./php/head.php'); ?>

<body>

    <?php include('./php/header.php'); ?>

    <?php include('./php/nav.php'); ?>

    <main>
    
        <h2>Admin Login</h2>

    <?php if(isset($_SESSION['logged']) && $_SESSION['logged']) 
    {   
        echo '<div><p>You are already logged in!</p></div>';
    }
    else 
    {
        echo '<span class="error" id="loginErr">'.$loginErr.'</span>
        <form id="login" method="post" action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'">
        <label> Username: <span> <input type="text" onkeyup="checkUser(\'user\')" id="user" name="user" value="'.$user.'">
        <span class="error" id="userErr">* '.$userErr.'</span></span> </label>
        <label> Create Password: <span> <input type="password" onkeyup="checkPassword(\'pass\'); checkPasswordsMatch();" id="pass" name="pass" value="'.$pass.'">
        <span class="error" id="passErr">* '.$passErr.'</span></span> </label>
        <label> Verify Password: <span> <input type="password" onkeyup="checkPassword(\'pass2\'); checkPasswordsMatch();" id="pass2" name="pass2" value="'.$pass2.'">
        <span class="error" id="pass2Err">* '.$passErr.'</span></span> </label>
        <input type="hidden" name="action" value="create">
        <input type="submit" class="button" name="submit" value="create">
        </form>';
    }        
    ?>
    </main>
    <script src="./js/verify.js"></script>
    <?php include('./php/footer.php'); ?>
</body>

</html>