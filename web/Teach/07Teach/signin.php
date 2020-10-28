<?php 
include('./php/database.php');
include('./php/status.php');
?>

<!DOCTYPE html>
<html lang="en">
<?php $title = 'Sign-in'; ?>
<?php $desc = 'Sign into the site.'; ?>
<?php $currentPage = 'signin'; ?>
<?php include('./php/head.php'); ?>

<body>

    <?php include('./php/header.php'); ?>

    <?php include('./php/nav.php'); ?>

    <main>
        <h2>Account Creation</h2>
        <span class="error"><?php echo $loginErr;?></span>
        <form id="login" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label> Username: <span> <input type="text" name="user" value="<?php echo $user;?>">
        <span class="error">* <?php echo $userErr;?></span></span> </label>
        <label> Create Password: <span> <input type="password" name="pass" value="<?php echo $pass;?>">
        <span class="error">* <?php echo $passErr;?></span></span> </label>        
        <input type="submit" class="button" name="submit" value="Sign-in">
        </form>
    </main>

    <?php include('./php/footer.php'); ?>
</body>

</html>