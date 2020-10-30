<?php 
include('./php/database.php'); 
include('./php/status.php');
include('./php/cartstatus.php');
?>

<!DOCTYPE html>
<html lang="en">
<?php $title = 'List of Games'; ?>
<?php $desc = 'List of Current Boardgames within our lovely site.'; ?>
<?php $currentPage = 'list'; ?>
<?php include('./php/head.php'); ?>

<body>

    <?php include('./php/header.php'); ?>

    <?php include('./php/nav.php'); ?>

    <main>
        <h2>Game Index</h2>
        <div id="gridContainer">        
            <?php                
                foreach ($db->query('SELECT g.game_id, g.name, i.img_name, i.alt_txt FROM games g INNER JOIN images i ON g.game_id = i.game_id') as $row)
                {
                  echo "<div><a href='./details.php?ID={$row['game_id']}' class='gameItem'><p>{$row['name']}</p>
                  <img src='./imgs/{$row['img_name']}' alt='{$row['alt_txt']}'>
                  </a></div>";
                }
            ?>
        </div>
    </main>

    <?php include('./php/footer.php'); ?>
</body>

</html>