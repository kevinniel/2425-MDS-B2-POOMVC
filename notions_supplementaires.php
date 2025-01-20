<?php 

// pour inclure un fichier, on utilise "include_once"
// Attention, toujours utiliser dirname(__FILE__) : pour récupérer le bon chemin du dossier dans lequel vous êtes, peut importe l'environnement
include_once dirname(__FILE__) . '/class.php';

class TreeConfig {

    public static $rowNumber = 6;
    public static $branch1 = 1;
    public static $branch2 = 3;
    public static $branch3 = 7;
    public static $isBaubles = TRUE;
    public static $isGarland = TRUE;

}

dd("----------------------");
dd( TreeConfig::$rowNumber );
