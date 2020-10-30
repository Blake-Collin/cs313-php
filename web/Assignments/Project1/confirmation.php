<?php 
include('./php/database.php'); 
include('./php/status.php');
include('./php/cartstatus.php');
?>
<!DOCTYPE html>
<html lang="en">
<?php $title = 'Confirmation'; ?>
<?php $desc = 'Your Order has been confirmed.'; ?>
<?php $currentPage = 'confirm'; ?>
<?php include('./php/head.php'); ?>

<body>

    <?php include('./php/header.php'); ?>

    <?php include('./php/nav.php'); ?>
    <main>
        <h2>Confrimation Page - Thank You!</h2>
        <?php 
            if(count($games) > 0)
            {
                $total = 0;
                echo 
                '<div id="tableContainer"><table>
                    <tr>
                        <th></th>
                        <th>Name</th>
                        <th>Price</th>
                    </tr>';
                foreach($games as $game)
                {                
                    //Fetch the row for the ID
                    if(
                        $rows = $db->query('SELECT 
                        s.sale_id,
                        g.name,
                        i.img_name,
                        i.alt_txt,
                        s.price
                    FROM
                        for_sale s
                    INNER JOIN
                        games g ON g.game_id = s.game_id
                    INNER JOIN
                        images i ON g.game_id = i.game_id
                    WHERE 
                        s.sale_id = \''. $game .'\';'))
                        {
                            $details = $rows->fetch(PDO::FETCH_ASSOC);
                        }

                    $total += ($details['price']);
                    echo '<tr>
                            <td><img src="./imgs/'. $details['img_name'] . '" alt="'. $details['alt_txt'] .'"></td>
                            <td>'. $details['name'] . '</td>
                            <td> $' . number_format(($details['price']), 2) .'</td>
                        </tr>';
                }

                echo '<tr id="totalRow">
                        <td class="hidden"></td>
                        <td>Total:</td>
                        <td>$' . number_format($total,2) . '</td>
                      </tr>
                      </table>
                      </div>

                      <div id="shippingDetails">
                        <h3>Shipping Details</h3>                        
                        <p>Email: ' . $_SESSION['email'] . '</p>
                        <p>Name: ' . $_SESSION['name'] . '</p>
                        <p>Street: ' . $_SESSION['street'] . '</p>
                        <p>State: ' . $_SESSION['state'] . '</p>
                        <p>Zip Code: ' . $_SESSION['zip'] . '</p>
                      </div>';
            }
           //Clear our shopping cart
           $games = Array();
           $_SESSION['games'] = $games;
           ?>
    </main>

    <?php include('./php/footer.php'); ?>
</body>

</html>