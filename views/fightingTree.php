<?php

$nbPlayers = 8;

$nbColumns = 2 * (log($nbPlayers,2)) + 1;
$nbLignes = $nbPlayers*2;

$tree= Controllers::buildArrayTree($nbColumns, $nbLignes);

?>

<div class="wrapper<?php echo $nbPlayers?>">

<?php

for ($j = 0; $j < $nbLignes; $j++){
    for($i = 0; $i < $nbColumns; $i++){
        switch ($tree[$i][$j]){
            case "J":
                ?>
                <div style="grid-column: <?php echo($i+1) ?> ; grid-row: <?php echo($j+1) ?>; text-align: center; border: solid 1px;">
                    X
                </div>
                <?php
            break;

            case "\\":
                ?>
                <div class="wrapper2x2" style="grid-column: <?php echo($i+1) ?> ; grid-row: <?php echo($j+1) ?>;">
                    <div class="leftToBot1"></div>
                    <div class="leftToBot2"></div>
                    <div class="leftToBot3"></div>
                </div>
                <?php
            break;

            case "X":
                ?>
                <div class="wrapper2x2" style="grid-column: <?php echo($i+1) ?> ; grid-row: <?php echo($j+1) ?>;">
                    <div class="cross1"></div>
                    <div class="cross2"></div>
                    <div class="cross3"></div>
                </div>
                <?php
            break;
            
            case "/":
                ?>
                <div class="wrapper2x2" style="grid-column: <?php echo($i+1) ?> ; grid-row: <?php echo($j+1) ?>;">
                    <div class="leftToTop1"></div>
                    <div class="leftToTop2"></div>
                    <div class="leftToTop3"></div>
                </div>
                <?php
            break;

            case "|":
                ?>
                <div class="wrapper2x2" style="grid-column: <?php echo($i+1) ?> ; grid-row: <?php echo($j+1) ?>;">
                    <div class="upToBot1"></div>
                    <div class="upToBot2"></div>
                </div>
                <?php
            break;
        }
    }
}

?>

</div>