<?php

class TreeConfig {

    public static $rowNumber = 6;
    public static $branch1 = 1;
    public static $branch2 = 3;
    public static $branch3 = 7;
    public static $isBaubles = TRUE;
    public static $isGarland = TRUE;

}

// Acces à des attributs d'objets : 
// $t = new TreeConfig();
// $t->attribut;

// Acceder aux attributs de classe (ou static) : 
// TreeConfig::$rowNumber;


// ATTENTION
/*

$a = new TreeConfig();
$b = new TreeConfig();

var_dump($a->rowNumber) => 6
var_dump($b->rowNumber) => 6
$a->rowNumber = 10
var_dump($a->rowNumber) => 10
var_dump($b->rowNumber) => 10

*/


