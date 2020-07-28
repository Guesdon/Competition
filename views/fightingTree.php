<?php

$nbPlayers = 4;// max 128

$nbColumns = 2 * (log($nbPlayers,2)) + 1;
$nbLignes = $nbPlayers*2;

$players = 
[
    [["player1","W"],["player2","L"],["player3","L"],["player4","W"],["player5","L"],["player6","W"],["player7","W"],["player8","L"],["player9","W"],["player10","L"],["player11","L"],["player12","W"],["player13","L"],["player14","W"],["player15","W"],["player16","L"]],
    [["player1","W"],["player4","L"],["player6","L"],["player7","W"],["player9","W"],["player12","L"],["player14","L"],["player15","W"]],
    [["player1","L"],["player7","W"],["player9","L"],["player15","W"]],
    [["player7",""],["player15",""]],
];

$tree= Controllers::buildArrayTree($nbColumns, $nbLignes);
?>

<div class="wrapper<?php echo $nbPlayers?>">

<?php

for ($j = 0; $j < $nbLignes; $j++){
    for($i = 0; $i < $nbColumns; $i++){
        $player="X";
        $color="black";

        if($i%2==0){
            if(isset($players[floor($i/2)])){
                if(isset($players[floor($i/2)][floor($j/pow(2, ceil(($i+1)/2)))])){
                    $player = $players[floor($i/2)][floor($j/pow(2, ceil(($i+1)/2)))][0];
                    switch($players[floor($i/2)][floor($j/pow(2, ceil(($i+1)/2)))][1]){
                        case "W":
                            $color="green";
                        break;
                        case "L":
                            $color="red";
                        break;
                    }
                }
            }
        }else{
            if(isset($players[floor($i/2)])){
                if(isset($players[floor($i/2)][floor($j/pow(2, ceil(($i+1)/2)))])){
                    switch($players[floor($i/2)][floor($j/pow(2, ceil(($i+1)/2)))][1]){
                        case "W":
                            $color="green";
                        break;
                        case "L":
                            $color="red";
                        break;
                    }
                }
            }
        }

        switch ($tree[$i][$j]){
            case "J":
                ?>
                <div class="playerCase" style="grid-column: <?php echo($i+1) ?> ; grid-row: <?php echo($j+1) ?>; border-color: <?php echo $color ?>">
                    <?php
                        echo $player;
                    ?>
                </div>
                <?php
            break;

            case "\\":
                ?>
                <div class="wrapper2x2" style="grid-column: <?php echo($i+1) ?> ; grid-row: <?php echo($j+1) ?>;">
                    <div class="leftToBot1<?php echo ucfirst($color) ?>"></div>
                    <div class="leftToBot2<?php echo ucfirst($color) ?>"></div>
                    <div class="leftToBot3<?php echo ucfirst($color) ?>"></div>
                </div>
                <?php
            break;

            case "X":
                ?>
                <div class="wrapper2x2" style="grid-column: <?php echo($i+1) ?> ; grid-row: <?php echo($j+1) ?>;">
                    <div class="cross1<?php echo ucfirst($color) ?>"></div>
                    <div class="cross2<?php echo ucfirst($color) ?>"></div>
                    <div class="cross3<?php echo ucfirst($color) ?>"></div>
                    <div class="cross4<?php echo ucfirst($color) ?>"></div>
                </div>
                <?php
            break;
            
            case "/":
                ?>
                <div class="wrapper2x2" style="grid-column: <?php echo($i+1) ?> ; grid-row: <?php echo($j+1) ?>;">
                    <div class="leftToTop1<?php echo ucfirst($color) ?>"></div>
                    <div class="leftToTop2<?php echo ucfirst($color) ?>"></div>
                    <div class="leftToTop3<?php echo ucfirst($color) ?>"></div>
                </div>
                <?php
            break;

            case "|":
                ?>
                <div class="wrapper2x2" style="grid-column: <?php echo($i+1) ?> ; grid-row: <?php echo($j+1) ?>;">
                    <div class="upToBot1<?php echo ucfirst($color) ?>"></div>
                    <div class="upToBot2<?php echo ucfirst($color) ?>"></div>
                </div>
                <?php
            break;
        }
    }
}

?>

</div>