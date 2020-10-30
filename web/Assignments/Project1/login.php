<?php 
include('./php/database.php'); 
include('./php/status.php');
include('./php/cartstatus.php');
?>

<!DOCTYPE html>
<html lang="en">
<?php $title = 'Administrator Login'; ?>
<?php $desc = 'Login into the site if you are an admin.'; ?>
<?php $currentPage = 'login'; ?>
<?php include('./php/head.php'); ?>

<body>

    <?php include('./php/header.php'); ?>

    <?php include('./php/nav.php'); ?>

    <main>
    <h2>Sign In</h2>
    <?php if(isset($_SESSION['logged']) && $_SESSION['logged']) 
    {   
        echo '<p>You are already logged in!</p>';
    }
    else 
    {
        echo '<span class="error"><?php echo $loginErr;?></span>
        <form id="login" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label> Username: <span> <input type="text" name="user" value="<?php echo $user;?>">
        <span class="error">* <?php echo $userErr;?></span></span> </label>
        <label> Create Password: <span> <input type="password" name="pass" value="<?php echo $pass;?>">
        <span class="error">* <?php echo $passErr;?></span></span> </label>
        <input type="hidden" name="action" value="login">
        <input type="submit" class="button" name="submit" value="Sign-in">
        </form>';
    }
    

        ?>
    </main>
    <?php include('./php/footer.php'); ?>
</body>

</html>