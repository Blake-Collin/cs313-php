<?php 
include('./php/database.php'); 
include('./php/status.php');
?>

<?php 
if(isset($_GET['ID']))
{
    $ID = clear_data($_GET['ID']);

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

$condition = $textbox = $rate = "";
$price = 0.00;
$conditionErr = $reivewErr = $rateErr = $priceErr = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if($_POST["action"] == "review")
    {
        if (empty($_POST["textbox"])) {
            $reivewErr = "Review Text is required!";
        } else {
            $textbox = clear_data($_POST["textbox"]);
        }

        if (empty($_POST["rate"]))
        {
            $rateErr = "Rating cannot be empty";
        } else {
            $rate = intval(clear_data($_POST["rate"]));
            if($rate < 1 || $rate > 5)
            {
                $rateErr = "Rating must be between 1 and 5!";
            }
        }


        if($reivewErr == "" 
            && $textbox != ""
            && $rateErr == "")
            {
                if(
                    $success = $db->query('INSERT INTO reviews 
                        (game_id, rating, review_text)
                    VALUES 
                        (\''. $ID .'\', \''. $rate .'\', \''. $textbox .'\');'))
                    {                                            
                        $rate = $textbox = "";
                    }
            }


    }
    else if($_POST["action"] == "sell")
    {
        if (empty($_POST["price"])) {
            $priceErr = "Price is required";
        } else {
            if(!preg_match("/^([1-9][0-9]*|0)(\.[0-9]{2})?$/", clear_data($_POST["price"])))
            {
                $priceErr = "Price is not in the correct format or positive.";
            }
            else
            {
                $price = floatval(clear_data($_POST["price"]));
            }            
        }

        if(empty($_POST["condition"]))
        {
            $conditionErr = "Condition Cannot be blan!k";
        }
        else
        {
            $condition = clear_data($_POST["condition"]);
            if (!preg_match("/^[a-zA-Z ]*$/",$condition)) {
                $stateErr = "Only letters and white space allowed!";
              }
        }

        if($condition != "" &&
            $conditionErr == "" &&
            $priceErr == "")
            {
                if(
                    $success = $db->query('INSERT INTO for_sale 
                        (game_id, price, condition, sold)
                    VALUES 
                        (\''. $ID .'\', \''. $price .'\', \''. $condition .'\', \''. false .'\');'))
                    {                                            
                        $price = "";
                        $condition = "New";
                    }
            }
    }
    else if ($_POST["action"] == "removeReview")
    {
        $db->query('DELETE FROM reviews WHERE review_id = \''. $_POST['reivew_id'] .'\';');
    }    
    else if ($_POST["action"] == "removeSale")
    {
        $db->query('DELETE FROM for_sale WHERE sale_id = \''. $_POST['sale_id'] .'\';');
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
            <h3>Description</h3>
            <div>
                <p class="description"><?php echo $details['description_text']; ?></p>
            </div>
        </section>

        <section id="market">
            <h3>Market</h3>
            <div id="pricing">
                <p>MSRP: <?php echo $details['msrp_price']; ?> </p>
                <p>Historical High: <?php echo $details['historical_high']; ?> </p>
                <p>Historical Low: <?php echo $details['historical_low']; ?> </p>
            </div>

            <h3>Selling</h3>
            <div id="sales">                
                <h4>For Sale</h4>  
                <?php 
                echo '<table><thead>
                        <tr>                            
                            <th>Condition</th>
                            <th>Price</th>';
                if(isset($_SESSION) && $_SESSION['logged'])
                {
                    echo '<th>Remove?</th>';
                }
                            
                echo '</tr></thead><tbody>';
                    foreach($db->query("SELECT s.sale_id, s.price, s.condition FROM for_sale s WHERE s.game_id = '$ID'") as $row)
                    {
                        echo '<tr>
                                <td>'. $row['condition']. '</td>
                                <td> <p>' .  $row['price']  . '</p></td>';
                                
                                if(isset($_SESSION) && $_SESSION['logged'])
                                {
                                    echo '<td> <form method="post" action="'. htmlspecialchars($_SERVER["PHP_SELF"]) . "?ID=" . $ID  .'">
                                    <input type="hidden" name="action" value="removeSale">
                                    <input type="hidden" name="sale_id" value="' . $row['sale_id'] . '">
                                    <input type="submit" value="Remove">
                                    </form>
                                    </td>';
                                }
                            echo '</tr>';
                    }
                    echo '</tbody></table>';
                    ?>              
            </div>
            
            <div>
                <h4>Post for Sale</h4>
                <form method="post" class="saleForm"
                    action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . "?ID=" . $ID;?>">
                    <label class="saleForm"> Review:
                        <span>
                            <select name="condition" value="<?php echo $condition;?>">
                                <option value='New'>New</option>
                                <option value='Like New'>Like New</option>
                                <option value='Very Good'>Very Good</option>
                                <option value='Good'>Good</option>
                                <option value='Acceptable'>Acceptable</option>
                                <option value='Unacceptable'>Unacceptable</option>
                            </select>
                            <span class="error">* <?php echo $conditionErr;?></span>
                        </span>
                    </label>
                    <label class="saleForm"> Price:
                        <span>
                            <input type="text" name="price" value="<?php echo $price;?>">
                            <span class="error">* <?php echo $priceErr;?></span>
                        </span>
                    </label>
                    <input type="hidden" name="action" value="sell">
                    <input type="submit" class="button" name="submit" value="Submit">
                </form>
            </div>            
        </section>

        <section id="reviews">
            <h3>Reviews</h3>
            <div>
                <h4>Player Reviews</h4>
                <?php 
                echo '<table><thead>
                        <tr>                            
                            <th>Rating</th>
                            <th>Review</th>';
                if(isset($_SESSION) && $_SESSION['logged'])
                {
                    echo '<th>Remove?</th>';
                }
                            
                echo '</tr></thead><tbody>';
                    foreach($db->query("SELECT r.review_id, r.rating, r.review_text FROM reviews r WHERE r.game_id = '$ID'") as $row)
                    {
                        echo '<tr>
                                <td>'. $row['rating']. '</td>
                                <td> <p>' .  $row['review_text']  . '</p></td>';
                                
                                if(isset($_SESSION) && $_SESSION['logged'])
                                {
                                    echo '<td> <form method="post" action="'. htmlspecialchars($_SERVER["PHP_SELF"]) . "?ID=" . $ID .'">
                                    <input type="hidden" name="action" value="removeReview">
                                    <input type="hidden" name="review_id" value="' . $row['review_id'] . '">
                                    <input type="submit" value="Remove">
                                    </form>
                                    </td>';
                                }                            
                            echo '</tr>';
                    }
                    echo '</tbody></table>';
                    ?>
            </div>
            
            <div>
            <h4>Post Review</h4>
                <form method="post" class="reviewForm"
                    action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . "?ID=" . $ID;?>">
                    <label class="reviewForm"> Rating:
                        <span>
                            <select name="rate" value="<?php echo $rate;?>">
                                <option value='1'>1</option>
                                <option value='2'>2</option>
                                <option value='3'>3</option>
                                <option value='4'>4</option>
                                <option value='5'>5</option>
                            </select>
                            <span class="error">* <?php echo $rateErr;?></span>
                        </span>
                    </label>
                    <label class="reviewForm"> Review:
                        <span>
                            <textarea name="textbox" value="<?php echo $textbox;?>"></textarea>
                            <span class="error">* <?php echo $reivewErr;?></span>
                        </span>
                    </label>
                    <input type="hidden" name="action" value="review">
                    <input type="submit" class="button" name="submit" value="Submit">
                </form>
            </div>            
        </section>

    </main>

    <?php include('./php/footer.php'); ?>
</body>

</html>