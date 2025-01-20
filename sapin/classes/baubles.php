<?php

class Baubles {

    public $maxStars;

    public function __construct ($maxStars){
        $this->maxStars = $maxStars;
        $this->baublesDisplay();
    }

    private function baublesSetup($symbol) {
        $baubles = "<pre style = 'margin: 0;'>";
        $baubles .= str_repeat(" " . $symbol, ($this->maxStars - 3)/4);
        $baubles .= " ";
        $baubles .= str_repeat("*", 3);
        $baubles .= " ";
        $baubles .= str_repeat($symbol . " ", ($this->maxStars - 3)/4);
        $baubles .= "</pre>";
        echo($baubles);
    }

    // Les boules de Noël, si elles s'affichent, sont sur deux lignes ($baubleHeight = 2) : important pour l'affichage du tronc ensuite.
    private function baublesDisplay() {
        $this->baublesSetup("|");
        $this->baublesSetup("0");
    }
}