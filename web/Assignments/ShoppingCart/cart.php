<?php require './php/session.php' ?>

<!DOCTYPE html>
<html lang="en">
<?php $title = 'Shopping Cart'; ?>
<?php $desc = 'See your list of items in your cart!'; ?>
<?php $currentPage = 'cart'; ?>
<?php include('./php/head.php'); ?>

<body>

    <?php include('./php/header.php'); ?>

    <?php include('./php/nav.php'); ?>

    <main>
        <h2>Shopping Cart</h2>
        
            <?php 
                if(count($games) > 0)
                {
                    $total = 0;
                    echo 
                    '<div id="tableContainer">';
                    if(isset($_SESSION['error']) && !empty($_SESSION['error']))
                    {
                        echo '<div class ="error">' . $_SESSION['error'] . '</div>';                        
                        unset($_SESSION['error']);
                    }                    
                    echo '<table>
                        <tr>
                            <th></th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Count</th>
                            <th>Subtotal</th>
                            <th>Remove?</th>
                        </tr>';
                    foreach($games as $key=>$game)
                    {
                        $total += ($game->count * $game->price);
                        echo '<tr>
                                <td><img src="./imgs/'. $game->img . '" alt="'. $game->name .'"></td>
                                <td>'. $game->name . '</td>
                                <td> $' . number_format(($game->price), 2) .'</td>
                                <td>    <form method="post" action="'. htmlspecialchars($_SERVER["PHP_SELF"]) .'">
                                        <input type="number" name="count" value="' . $game->count . '">
                                        <input type="hidden" name="action" value="update">
                                        <input type="hidden" name="name" value="' . $game->name . '">
                                        <input type="submit" value="Update">
                                    </form>
                                </td>
                                <td>$' . number_format(($game->count * $game->price),2) . '</td>
                                <td> <form method="post" action="'. htmlspecialchars($_SERVER["PHP_SELF"]) .'">
                                        <input type="hidden" name="action" value="remove">
                                        <input type="hidden" name="name" value="' . $game->name . '">
                                        <input type="submit" value="Remove">
                                    </form> 
                                </td>
                            </tr>';
                    }
                    echo '<tr id="totalRow">
                            <td class="hidden"></td>
                            <td class="hidden"></td>
                            <td class="hidden"></td>
                            <td>Total:</td>
                            <td>$' . number_format($total,2) . '</td>
                            <td class="hidden"></td>
                          </tr>
                          </table>
                          </div>';
                    echo '<div id="buttons"> 
                                <form method="post" action="'. htmlspecialchars($_SERVER["PHP_SELF"]) .'">
                                    <input type="hidden" name="action" value="empty">
                                    <input type="submit" class="button" value="Empty Cart">
                                </form> 
                                <form method="get" action="'. htmlspecialchars('./checkout.php') .'">
                                    <input type="submit" class="button" value="Check Out">
                                </form> 
                          </div>';
                    
                }
                else
                {   
                    echo '<h3 id="empty">Your Chart is empty</h3>';
                }
            ?>
        </table>
    </main>

    <?php include('./php/footer.php'); ?>
</body>

</html>