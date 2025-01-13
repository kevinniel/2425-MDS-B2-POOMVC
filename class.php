<?php

function dd($a) {
    echo("<pre>");
    echo("<code>");
    var_dump($a);
    echo("</code>");
    echo("</pre>");
}

// Tabouret

// informations : 
    // nb_pieds
    // taille
    // couleur

class Tabouret {

    // Variable dans la classe => attribut
    public $nb_pieds;
    public $taille;
    public $couleur;

    public $is_plie = true;

    public function deplier() {
        $this->is_plie = false;
        echo("je me suis déplié !");
    }
    
    public function plier() {
        $this->is_plie = true;
        echo("je me suis plié !");
    }

}

$toto = new Tabouret();
dd( $toto );
$toto->nb_pieds = 3;
dd( $toto );
$tata = new Tabouret();
dd($tata);
$tata->deplier();
dd($tata);
$tata->plier();
dd($tata);



