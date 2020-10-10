<nav>
    <ul class="navigation">
        <li><a href="#" onclick="toggleNavMenu()">☰ Menu</a></li>
        <li><a href="./index.php" <?php if ($currentPage === 'list') {echo 'class="active"';} ?>>List of Games</a></li>
        <li><a href="./search.php" <?php if ($currentPage === 'search') {echo 'class="active"';} ?>>Search Games</a></li>
    </ul>
</nav>