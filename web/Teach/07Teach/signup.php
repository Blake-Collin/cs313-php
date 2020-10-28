<?php 
include('./php/database.php');
include('./php/status.php');
?>

<!DOCTYPE html>
<html lang="en">
<?php $title = 'Sign-up'; ?>
<?php $desc = 'Create User for the site.'; ?>
<?php $currentPage = 'signup'; ?>
<?php include('./php/head.php'); ?>

<body>

    <?php include('./php/header.php'); ?>

    <?php include('./php/nav.php'); ?>

    <main>
        <h2>Account Creation</h2>
        <span class="error"><?php echo $loginErr;?></span>
        <form id="login" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label> Username: <span> <input type="text" onkeyup="checkUser('user')" id="user" name="user" value="<?php echo $user;?>">
        <span class="error" id="userErr">* <?php echo $userErr;?></span></span> </label>
        <label> Create Password: <span> <input type="password" onkeyup="checkPassword('pass')" id="pass" name="pass" value="<?php echo $pass;?>">
        <span class="error" id="passErr">* <?php echo $passErr;?></span></span> </label>
        <label> Verify Password: <span> <input type="password" onkeyup="checkPassword('pass2')" id="pass2" name="pass2" value="<?php echo $pass2;?>">
        <span class="error" id="pass2Err">* <?php echo $passErr;?></span></span> </label>
        <input type="hidden" name="action" value="create">
        <input type="submit" class="button" name="submit" value="create">
        </form>
    </main>
    <script src="./js/verify.js"></script>
    <?php include('./php/footer.php'); ?>
</body>

</html>