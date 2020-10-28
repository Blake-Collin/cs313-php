<nav>
    <ul class="navigation">
        <li><a href="#" onclick="toggleNavMenu()">☰ Menu</a></li>
        <li><a href="./index.php" <?php if ($currentPage === 'welcome') {echo 'class="active"';} ?>>Welcome Page</a></li>
        <li><a href="./signup.php" <?php if ($currentPage === 'signup') {echo 'class="active"';} ?>>Sign Up</a></li>
        <li><a href="./signin.php" <?php if ($currentPage === 'signin') {echo 'class="active"';} ?>>Sign In</a></li>
    </ul>
</nav>