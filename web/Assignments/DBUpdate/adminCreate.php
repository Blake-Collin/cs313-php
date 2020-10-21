<?php 
include('./php/database.php');
include('./php/status.php');
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
        <h2>Admin Login</h2>
        <span class="error"><?php echo $loginErr;?></span>
        <form id="login" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label> Username: <span> <input type="text" name="user" value="<?php echo $user;?>"></span> </label>
        <label> Create Password: <span> <input type="text" name="pass1" value="<?php echo $pass1;?>"></span> </label>
        <label> Verify Password: <span> <input type="text" name="pass2" value="<?php echo $pass2;?>"></span> </label>
        <label> Creation Password: <span> <input type="text" name="cPass" value="<?php echo $cPass;?>"></span> </label>
        <input type="hidden" value="create">
        <input type="submit" class="button" name="submit" value="Login">
        </form>
    </main>

    <?php include('./php/footer.php'); ?>
</body>

</html>