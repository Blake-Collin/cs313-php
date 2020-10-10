<?php include('./php/database.php') ?>

<?php 
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
    }
?>

<!DOCTYPE html>
<html lang="en">
<?php $title = 'Search Games'; ?>
<?php $desc = 'Search through the Current Boardgames within our lovely site.'; ?>
<?php $currentPage = 'search'; ?>
<?php include('./php/head.php'); ?>

<body>

    <?php include('./php/header.php'); ?>

    <?php include('./php/nav.php'); ?>

    <main>
        <h2>Search Games</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <input type="text" name="game">
            <input type="submit" value="Search">
        </form>        
        <div id="gridContainer">        
            <?php                
                foreach ($db->query('SELECT g.game_id, g.name, i.img_name, i.alt_txt FROM games g INNER JOIN images i ON g.game_id = i.game_id') as $row)
                {
                  echo "<div><a href='./details.php?id={$row['game_id']}' class='gameItem'><p>{$row['name']}</p>
                  <img src='./imgs/{$row['img_name']}' alt='{$row['alt_txt']}'>
                  <a></div>";
                }
            ?>                   
        </div>
    </main>

    <?php include('./php/footer.php'); ?>
</body>

</html>