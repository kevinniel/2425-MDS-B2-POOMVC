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
    public $is_plie;

    // constructeur => la fonction se déclenche directement dès l'instanciation d'un objet
    public function __construct($etat) {
        echo ("coucou");
        $this->is_plie = $etat;
        $this->setCouleur();
    }

    public function setCouleur() {
        $couleurs = [
            "bleu",
            "blanc",
            "rouge",
        ];

        $this->couleur = $couleurs[ random_int(0,2) ];
    }

    public function deplier() {
        $this->is_plie = false;
        echo("je me suis déplié !");
    }
    
    public function plier() {
        $this->is_plie = true;
        echo("je me suis plié !");
    }

}

$toto = new Tabouret(false);
dd( $toto );
$toto->nb_pieds = 3;
dd( $toto );
$tata = new Tabouret(true);
dd($tata);
$tata->deplier();
dd($tata);
$tata->plier();
dd($tata);



