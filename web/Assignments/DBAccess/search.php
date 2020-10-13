<?php include('./php/database.php') ?>

<?php 
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["game"])) {
            $gameErr = "Game name is required";
        } else {
            $name = test_input($_POST["game"]);
            if (!preg_match("/^[a-zA-Z-' ]*$/",$game)) {
                $gameErr = "Only letters and white space allowed";
            }
        }


    }

    //Function for clearing inputs for code injections
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
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
        <form id="searchForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <label>Name: <input type="text" name="game" value="<?php echo $game ?>">
            <span class="error">* <?php echo $nameErr;?></span></label>
            <input type="submit" value="Search">
        </form>        
        <div id="gridContainer">        
            <?php                
                if($gameErr == "" && $game != "")
                {
                    foreach ($db->query("SELECT g.game_id, g.name, i.img_name, i.alt_txt FROM games g INNER JOIN images i ON g.game_id = i.game_id WHERE g.name LIKE '%$game%'") as $row)
                    {
                        echo "<div><a href='./details.php?id={$row['game_id']}' class='gameItem'><p>{$row['name']}</p>
                        <img src='./imgs/{$row['img_name']}' alt='{$row['alt_txt']}'>
                        <a></div>";
                    }
                }
            ?>                   
        </div>
    </main>

    <?php include('./php/footer.php'); ?>
</body>

</html>