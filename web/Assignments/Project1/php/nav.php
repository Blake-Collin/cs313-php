<?php $count = 0; 
    if(isset($_SESSION['games']) && !empty($_SESSION['games']))
    {
        $count = count($games);
    }
?>
<nav>
    <ul class="navigation">
        <li><a href="#" onclick="toggleNavMenu()">☰ Menu</a></li>
        <li><a href="./index.php" <?php if ($currentPage === 'list') {echo 'class="active"';} ?>>List of Games</a></li>
        <li><a href="./search.php" <?php if ($currentPage === 'search') {echo 'class="active"';} ?>>Search Games</a></li>
        <li><a href="./login.php" <?php if ($currentPage === 'login') {echo 'class="active"';} ?>>Login</a></li>
        <li><a href="./cart.php" <?php if ($currentPage === 'cart') {echo 'class="active"';} ?>>Shopping Cart <span
                    id="cartNum"><?php if($currentPage == "confirm"){ echo '0'; } else { echo $count; } ?></span></a></li>
    </ul>
</nav>