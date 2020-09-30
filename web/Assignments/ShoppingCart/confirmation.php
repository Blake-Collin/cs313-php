<?php require './php/session.php' ?>
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
                        <th>Count</th>
                        <th>Subtotal</th>
                    </tr>';
                foreach($games as $key=>$game)
                {
                    $total += ($game->count * $game->price);
                    echo '<tr>
                            <td><img src="./imgs/'. $game->img . '" alt="'. $game->name .'"></td>
                            <td>'. $game->name . '</td>
                            <td> $' . number_format(($game->price), 2) .'</td>
                            <td>' . $game->count . '</td>
                            <td>$' . number_format(($game->count * $game->price),2) . '</td>
                        </tr>';
                }
                echo '<tr id="totalRow">
                        <td class="hidden"></td>
                        <td class="hidden"></td>
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
            session_unset();
            session_destroy();
           ?>
    </main>

    <?php include('./php/footer.php'); ?>
</body>

</html>