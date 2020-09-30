<?php 
$count = 0; 
 if(isset($_SESSION['games']) && !empty($_SESSION['games']))
 {
    foreach($games as $game)
    {
        $count += $game->count;
    }
}
?>

<nav>
    <ul class="navigation">
        <li><a href="#" onclick="toggleNavMenu()">☰ Menu</a></li>
        <li><a href="./index.php" <?php if ($currentPage === 'browse') {echo 'class="active"';} ?>>Browse List</a></li>
        <li><a href="./cart.php" <?php if ($currentPage === 'cart') {echo 'class="active"';} ?>>Shopping Cart <span
                    id="cartNum"><?php if($currentPage == "confirm"){ echo '0'; } else { echo $count; } ?></span></a></li>
    </ul>
</nav>