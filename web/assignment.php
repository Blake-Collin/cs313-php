<!DOCTYPE html>
<html lang="en">
    <?php $title = 'Assignment Portal'; ?>
    <?php $desc = 'Page with all assignment listings'; ?>
    <?php $currentPage = 'assignment'; ?>
    <?php $header = 'Assignment Portal'; ?>
    <?php include('./php/head.php'); ?>
	<body>
	
        <?php include('./php/header.php'); ?>
		
		<?php include('./php/navbar.php'); ?>
		
		<main>
            <ul>
                <li><h2>Assignment Links</h2></li>
                <li><a href="./index.php">W01 - PHPinfo Page</a></li>
                <li><a href="./hello.html">W01 - Hello World Page</a></li>
                <li><a href="./02Teach/teach2.html">W02 - 02 Teach: Team Activity</a></li>
                <!-- <li><a href=""></a></li> Template for later additions -->
            </ul>
		</main>
		
		<?php include('./php/footer.php'); ?>
	</body>
</html>
