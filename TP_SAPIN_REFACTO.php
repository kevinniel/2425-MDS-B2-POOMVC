<?php
$nbEtage = 20;
$nbMaxEtoile = (3 + 2*($nbEtage - 1))*2 + 1;

$nbEtoile1 = 1;
$nbEtoile2 = 3;
$nbEtoile3 = 7;

$isGarland = TRUE;
if($isGarland == TRUE){
    $garland = "S";
} elseif($isGarland == FALSE){
    $garland = " ";
}

$isBalls = TRUE;
$balls = [
    "<pre style = 'margin: 0;'>" . str_repeat(" |", ($nbMaxEtoile - 3)/4) . " " . str_repeat("*", 3) . " " . str_repeat("| ", ($nbMaxEtoile - 3)/4) . "</pre>",
    "<pre style = 'margin: 0;'>" . str_repeat(" 0", ($nbMaxEtoile - 3)/4) . " " . str_repeat("*", 3) . " " . str_repeat("0 ", ($nbMaxEtoile - 3)/4) . "</pre>"
];

for($i = 0; $i <= $nbEtage - 1; $i++){
    $row1 = "<pre style = 'margin: 0;'>" . " " . str_repeat(" ", ($nbMaxEtoile - $nbEtoile1) / 2) . str_repeat("*", $nbEtoile1) . str_repeat(" ", ($nbMaxEtoile - $nbEtoile1) / 2) . " " . "</pre>";
    $row2 = "<pre style = 'margin: 0;'>" . " " . str_repeat(" ", ($nbMaxEtoile - $nbEtoile2) / 2) . str_repeat("*", $nbEtoile2) . str_repeat(" ", ($nbMaxEtoile - $nbEtoile2) / 2) . " " . "</pre>";
    $row3 = "<pre style = 'margin: 0;'>" . str_repeat(" ", ($nbMaxEtoile - $nbEtoile3) / 2) . $garland . str_repeat("*", $nbEtoile3) . $garland . str_repeat(" ", ($nbMaxEtoile - $nbEtoile3) / 2) . "</pre>";

    echo $row1;
    echo $row2;
    echo $row3;

    $nbEtoile1 = $nbEtoile2;
    $nbEtoile2 = $nbEtoile3;
    $nbEtoile3 += 4;
}

if($isBalls == TRUE){
    for($i=0 ; $i < count($balls); $i++){
        echo $balls[$i];
    }
} else{
    for($i=0 ; $i < count($balls); $i++){
        echo "<pre style = 'margin: 0;'>" . str_repeat(" ", ($nbMaxEtoile - 1) / 2) . str_repeat("*", 3) . str_repeat(" ", ($nbMaxEtoile - 3) / 2) . "</pre>";
    }
}

for($i = 0; $i <= $nbEtage - 1; $i++){
    echo "<pre style = 'margin: 0;'>" . str_repeat(" ", ($nbMaxEtoile - 1) / 2) . str_repeat("*", 3) . str_repeat(" ", ($nbMaxEtoile - 3) / 2) . "</pre>";
}

