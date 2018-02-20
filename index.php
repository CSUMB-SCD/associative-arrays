<!DOCTYPE html>
<html>
    <head>
        <link href="./css/styles.css" rel="stylesheet" type="text/css"/>
        <title>Silverjack</title>
    </head>
    <body>
        
    </body>
</html>
<?php

    $suit = array("hearts"=>array("./img/cards/hearts/1.png","./img/cards/hearts/2.png","./img/cards/hearts/3.png","./img/cards/hearts/4.png","./img/cards/hearts/5.png",
    "./img/cards/hearts/6.png","./img/cards/hearts/7.png","./img/cards/hearts/8.png","./img/cards/hearts/9.png","./img/cards/hearts/10.png","./img/cards/hearts/11.png",
    "./img/cards/hearts/12.png","./img/cards/hearts/13.png"), "diamonds" => array("./img/cards/diamonds/1.png","./img/cards/diamonds/2.png","./img/cards/diamonds/3.png","./img/cards/diamonds/4.png","./img/cards/diamonds/5.png",
    "./img/cards/diamonds/6.png","./img/cards/diamonds/7.png","./img/cards/diamonds/8.png","./img/cards/diamonds/9.png","./img/cards/diamonds/10.png","./img/cards/diamonds/11.png",
    "./img/cards/diamonds/12.png","./img/cards/diamonds/13.png"), "spades" => array("./img/cards/spades/1.png","./img/cards/spades/2.png","./img/cards/spades/3.png","./img/cards/spades/4.png","./img/cards/spades/5.png",
    "./img/cards/spades/6.png","./img/cards/spades/7.png","./img/cards/spades/8.png","./img/cards/spades/9.png","./img/cards/spades/10.png","./img/cards/spades/11.png",
    "./img/cards/spades/12.png","./img/cards/spades/13.png"),"clubs" => array("./img/cards/clubs/1.png","./img/cards/clubs/2.png","./img/cards/clubs/3.png","./img/cards/clubs/4.png","./img/cards/clubs/5.png",
    "./img/cards/clubs/6.png","./img/cards/clubs/7.png","./img/cards/clubs/8.png","./img/cards/clubs/9.png","./img/cards/clubs/10.png","./img/cards/clubs/11.png",
    "./img/cards/clubs/12.png","./img/cards/clubs/13.png"));
   
    $players = array(array("Sam"),array("Chris"));
   
    function getHand($players,$player,$suit){
        $points = 0;
        $card_index = array();
        $deal = true;
       
            while($deal)
            {
                $symbol = rand(0,3);
                $index = rand(0,12);
                
                if(!array_search(array("hearts",$index),$card_index) && !array_search(array("diamonds",$index),$card_index) && !array_search(array("spades",$index),$card_index) && !array_search(array("clubs",$index),$card_index))
                {
                    $points= $points + $index + 1;
                    
                    if($points > 42)
                    {
                        $points = $points - $index - 1;
                        $deal = false;
                    }
                    else {
                    
                        
                        if($symbol == 0)
                        {
                            $card_index[] = array("hearts",$index);
                        }
                        else if($symbol == 1)
                        {
                            $card_index[] = array("diamonds",$index);
                        }
                        else if($symbol == 2)
                        {
                            $card_index[] = array("spades",$index);
                        }
                        else if($symbol == 3)
                        {
                            $card_index[] = array("clubs",$index);
                        }
                    
                    }
                
                }
                
            }
        
      
        
        
        foreach ($card_index as $index)
        {
            $players[$player][] = $suit[$index[0]][$index[1]];
        }
        
        
        $players[$player][] = $points;
        return $players;
       
    }
    
    $players = getHand($players,0,$suit);
    
    for($i = 1; $i < count($players[0])-1; $i++)
    {
        echo "<img src=" . $players[0][$i] . " style=display:inline;margin-right:10px;></img>";
    }
    
    echo "<h1 " . "style = display:inline;>" . $players[0][count($players[0])-1] . "</h1>";
?>
