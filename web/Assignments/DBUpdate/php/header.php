<header>
        <div class="container">
            <a href="./index.php"><img src="./imgs/logo.png" alt="Image of Dice"></a>
            <div id="name">
                <h1><span id="thunder">Thunder</span> & <span id="dice">Dice</span></h1>
                <h2 class="motto">Nothing like a board game!</h2>
            </div>
        </div>
        <?php 
            if(isset($_SESSION['logged']) && isset($_SESSION['username']) && $_SESSION['logged'])
            {
                echo " <div class='container'><form method='post' action='". htmlspecialchars($_SERVER["PHP_SELF"]) ."'>
                <input type='hidden' name='action' value='logout'>                
                <input type='submit' value='Logout'> </form> <p id='logged'> Current User: " . $_SESSION['username'] . "</p></div>";
            }
        ?>
    </header>