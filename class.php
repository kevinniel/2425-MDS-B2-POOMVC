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
    public $taille = 3;
    public $couleur;
    public $is_plie;
    public $prix_fabrication;
    private $factor = 15;

    // constructeur => la fonction se déclenche directement dès l'instanciation d'un objet
    public function __construct($etat) {
        echo ("coucou");
        $this->is_plie = $etat;
        $this->setCouleur();
        $this->calculPrixfabrication();
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

    private function calculPrixfabrication() {
        $this->prix_fabrication = $this->taille * $this->factor;
    }

}

// $toto = new Tabouret(false);
// dd( $toto );
// $toto->nb_pieds = 3;
// dd( $toto );
// $tata = new Tabouret(true);
// dd($tata);
// $tata->deplier();
// dd($tata);
// $tata->plier();
// dd($tata);


$tutu = new Tabouret(true);
dd($tutu);
$tutu->deplier();
dd($tutu);
// error parce que factor private
// $tutu->factor = 2;


// Je veux faire une chaise !
// Extends => héritage => on récupère tout ce qui est public chez le parent
class Chaise extends Tabouret {
    public $dossier;
}

$c = new Chaise(true);
dd($c);