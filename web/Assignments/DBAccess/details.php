<?php include('./php/database.php') ?>

<?php 
if(isset($_GET['ID']))
{
    $ID = $_GET['ID'];

if(
    $rows = $db->query('SELECT 
	g.name,
	d.description_text,
	d.duration,
	d.complexity,
	d.max_players,
	d.min_players,
	m.msrp_price,
	m.historical_low,
	m.historical_high,
	i.img_name,
	i.alt_txt
FROM
	games g
INNER JOIN
	description d ON g.game_id = d.game_id
INNER JOIN
	msrp m ON g.game_id = m.game_id
INNER JOIN
	images i ON g.game_id = i.game_id
WHERE 
    g.game_id = '. $ID .';'))
    {
        $details = $rows->fetch(PDO::FETCH_ASSOC);
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<?php $title = $details['name'] ?>
<?php $desc = 'Details Page for '. $details['name']; ?>
<?php $currentPage = 'details'; ?>
<?php include('./php/head.php'); ?>

<body>

    <?php include('./php/header.php'); ?>

    <?php include('./php/nav.php'); ?>

    <main>
        
        <section id="information">
        <h2><?php echo $details['name']; ?></h2>        
        <div class="listContainer">
            <img src="./imgs/<?php echo $details['img_name']; ?>" alt="<?php echo $details['alt_txt']; ?>"> 
            <span class="list"> 
                <p>Complexity: <?php echo $details['complexity']; ?> </p>
                <p>Players: <?php echo $details['min_players']; ?>-<?php echo $details['max_players']; ?> </p>
                <p>Play Time (Minutes): <?php echo $details['duration']; ?> </p>
            </span> 
        </div>
        <p class="description"><?php echo $details['description_text']; ?></p>
        </section>
        <section id="market">
            <h3>Market</h3>
            <div id="pricing">
                <p>MSRP: <?php echo $details['msrp_price']; ?> </p>
                <p>Historical High: <?php echo $details['historical_high']; ?> </p>
                <p>Historical Low: <?php echo $details['historical_low']; ?> </p>
            </div>
            <div id="sales">
                <h4>For Sale</h4>
                <p>Coming Soon!</P>
                <!--- Needs to be built out later -->
            </div>
        </section>
        <section id="reviews">
            <h3>Reveiws</h3>
            <p>Coming soon!</p>
            <!--- Needs to be built out later -->
        </section>

    </main>

    <?php include('./php/footer.php'); ?>
</body>

</html>