<nav>
    <ul class="navigation">
        <li><a href="#" onclick="toggleNavMenu()">☰ Menu</a></li>
        <li><a href="./home.php" <?php if ($currentPage === 'home') {echo 'class="active"';} ?>>Home</a></li>
        <li><a href="./assignment.php" <?php if ($currentPage === 'assignment') {echo 'class="active"';} ?>>Assignment Portal</a></li>
    </ul>
</nav>