<header>
        <div class="container">
           <h1>User Access Website</h1>
        </div>
        <?php 
            if(isset($_SESSION['logged']) && isset($_SESSION['username']) && $_SESSION['logged'])
            {
                echo " <div class='container' id='logstatus'><p id='logged'> Current User: " . $_SESSION['username'] . "</p><form method='post' action='". htmlspecialchars('./index.php') ."'>
                <input type='hidden' name='action' value='logout'>                
                <input type='submit' value='Logout'> </form></div>";
            }
        ?>
    </header>