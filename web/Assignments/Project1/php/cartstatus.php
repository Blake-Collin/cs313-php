<?php //Session file so if adjustments are needed I can have them across all pages.
 session_start(); 

$games = Array();

 if(isset($_SESSION['games']) && !empty($_SESSION['games']))
 {
     $games = $_SESSION['games'];
 }

 if(count($_POST) != 0)
 {
     $action = htmlspecialchars($_POST['action']);
    if($action == "empty")
     {         
         $games = Array();
     }
     elseif($action == "add")
     {        
        $found = false;
        foreach($games as $game)
        {            
            if($_POST['sale_id'] === $game)
            {                                
                $found = true;
                break;
            }
        }

        if(!$found)
        {            
            $games[] = $id->$id;
        }        
     }
     elseif ($action == "remove")
     {
        foreach($games as $key => $game)
        {
            if($_POST['sale_id'] == $game)
            {
                unset($games[$key]);
                break;
            }
        }
     }
 }

 $_SESSION['games'] = $games;

 ?>