<?php require './php/session.php' ?>

<!DOCTYPE html>
<html lang="en">
<?php $title = 'Browse Items'; ?>
<?php $desc = 'Shopping for Boardgames then you have found the right place.'; ?>
<?php $currentPage = 'browse'; ?>
<?php include('./php/head.php'); ?>

<body>

    <?php include('./php/header.php'); ?>

    <?php include('./php/nav.php'); ?>

    <main>
        <h2>Games for Sale</h2>
        <div id="gridContainer">
            <div class="saleItem">
                <p>Battlestar Galactica: The Board Game</p>
                <img src="./imgs/battlestargalactica.jpg" alt="Battlestar Galactica: The Board Game">
                <span>
                    <p>$99.99</p>
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                        <input type="hidden" name="name" value="Battlestar Galactica: The Board Game">
                        <input type="hidden" name="price" value="99.99">
                        <input type="hidden" name="action" value="add">
                        <input type="hidden" name="img" value="battlestargalactica.jpg">
                        <input type="submit" value="Add to Cart">
                    </form>
                </span>
            </div>
            <div class="saleItem">
                <p>Brass: Birmingham</p>
                <img src="./imgs/brassbirmingham.jpg" alt="Brass Birmingham Board Game">
                <span>
                    <p>$59.99</p>
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                        <input type="hidden" name="name" value="Brass: Birmingham">
                        <input type="hidden" name="price" value="59.99">
                        <input type="hidden" name="action" value="add">
                        <input type="hidden" name="img" value="brassbirmingham.jpg">
                        <input type="submit" value="Add to Cart">
                    </form>
                </span>
            </div>

            <div class="saleItem">
                <p>Sekigahara: The Unification of Japan</p>
                <img src=".\imgs\sekigahara.jpg" alt="Sekigahara: The Unification of Japan">
                <span>
                    <p>$49.99</p>
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                        <input type="hidden" name="name" value="Sekigahara: The Unification of Japan">
                        <input type="hidden" name="price" value="49.99">
                        <input type="hidden" name="action" value="add">
                        <input type="hidden" name="img" value="sekigahara.jpg">
                        <input type="submit" value="Add to Cart">
                    </form>
                </span>
            </div>

            <div class="saleItem">
                <p>Star Trek: Ascendancy</p>
                <img src="./imgs/startrekascendancy.jpg" alt="Star Trek: Ascendancy">
                <span>
                    <p>$89.99</p>
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                        <input type="hidden" name="name" value="Star Trek: Ascendancy">
                        <input type="hidden" name="price" value="89.99">
                        <input type="hidden" name="action" value="add">
                        <input type="hidden" name="img" value="startrekascendancy.jpg">
                        <input type="submit" value="Add to Cart">
                    </form>
                </span>
            </div>

            <div class="saleItem">
                <p>Star Trek: Fleet Captains</p>
                <img src="./imgs/startrekfleetcaptains.jpg" alt="Star Trek: Fleet Captains">
                <span>
                    <p>$149.99</p>
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                        <input type="hidden" name="name" value="Star Trek: Fleet Captains">
                        <input type="hidden" name="price" value="149.99">
                        <input type="hidden" name="action" value="add">
                        <input type="hidden" name="img" value="startrekfleetcaptains.jpg">
                        <input type="submit" value="Add to Cart">
                    </form>
                </span>
            </div>

            <div class="saleItem">
                <p>Twilight Imperium (Fourth Edition)</p>
                <img src="./imgs/twilightimperium.jpg" alt="Twilight Imperium (Fourth Edition)">
                <span>
                    <p>$149.95</p>
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                        <input type="hidden" name="name" value="Twilight Imperium (Fourth Edition)">
                        <input type="hidden" name="price" value="149.95">
                        <input type="hidden" name="action" value="add">
                        <input type="hidden" name="img" value="twilightimperium.jpg">
                        <input type="submit" value="Add to Cart">
                    </form>
                </span>
            </div>

            <div class="saleItem">
                <p>War of the Ring: Second Edition</p>
                <img src="./imgs/warofthering2nd.jpg" alt="War of the Ring: Second Edition">
                <span>
                    <p>$69.99</p>
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                        <input type="hidden" name="name" value="War of the Ring: Second Edition">
                        <input type="hidden" name="price" value="69.99">
                        <input type="hidden" name="action" value="add">
                        <input type="hidden" name="img" value="warofthering2nd.jpg">
                        <input type="submit" value="Add to Cart">
                    </form>
                </span>
            </div>

        </div>
    </main>

    <?php include('./php/footer.php'); ?>
</body>

</html>