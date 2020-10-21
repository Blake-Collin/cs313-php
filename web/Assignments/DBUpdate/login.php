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
        <label> Password: <span> <input type="text" name="pass" value="<?php echo $pass;?>"></span> </label>
        <input type="hidden" value="login">
        <input type="submit" class="button" name="submit" value="Login">
        </form>
    </main>

    <?php include('./php/footer.php'); ?>
</body>

</html>