<?php //Session file so if adjustments are needed I can have them across all pages.
 session_start(); 

class Game {
     public $name;
     public $price;
     public $count;
     public $img;
 }

$games = Array();

 if(isset($_SESSION['games']) && !empty($_SESSION['games']))
 {
     $games = $_SESSION['games'];
 }

 //If we are doing an update proceed else ignore and just keep going.
 if(count($_POST) != 0)
 {
     $action = htmlspecialchars($_POST['action']);
     if ($action == "reset")
     {
        session_unset();
        session_destroy();
     } 
     elseif($action == "empty")
     {         
         $games = Array();
     }
     elseif($action == "add")
     {        
        $found = false;
        foreach($games as $game)
        {            
            if($_POST['name'] === $game->name)
            {                                
                $game->count = $game->count + 1;
                $found = true;
                break;
            }
        }

        if(!$found)
        {
            $newGame = new Game();
            $newGame->name = $_POST['name'];
            $newGame->price = (float)$_POST['price'];
            $newGame->count = 1;
            $newGame->img = $_POST['img'];
            $games[] = $newGame;
        }        
     }
     elseif ($action == "remove")
     {
        foreach($games as $key => $game)
        {
            if(strstr($_POST['name'],$game->name))
            {
                unset($games[$key]);
                break;
            }
        }
     }
     elseif ($action == "update")
     {
        $count = htmlspecialchars($_POST['count']);
        if(!is_numeric($count))
        {
            $_SESSION['error'] = "Your amount must be a number!";
        }        
        else if($count < 0 || $count > 100)
        {
            $_SESSION['error'] = "Amounts allowed must be between 0 and 100.";
        }
        else if($count == 0)
        {
            foreach($games as $key => $game)
            {
                if(strstr($_POST['name'],$game->name))
                {
                    unset($games[$key]);
                    break;
                }
            }
        }
        else
        {
            foreach($games as $key => $game)
            {
                if(strstr($_POST['name'],$game->name))
                {
                    $game->count = $count;
                    break;
                }
            }
        }
     }     
 }

 $_SESSION['games'] = $games;

 ?>