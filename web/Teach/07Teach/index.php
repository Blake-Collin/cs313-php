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
        <h2>User Sign-up & Sign-in Testing Page</h2>
        <div>
        <p>If you are logged in you will see your account name up above.</p>
        </div>

    </main>

    <?php include('./php/footer.php'); ?>
</body>

</html>