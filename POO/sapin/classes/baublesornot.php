<?php

include_once dirname(__FILE__) . '/../config/treeconfig.php';
include_once dirname(__FILE__) . '/../classes/baubles.php';

class BaublesOrNot {

    public $isBaubles;
    public $maxStars;

    public function __construct($maxStars) {
        $this->isBaubles = TreeConfig::$isBaubles;
        $this->maxStars = $maxStars;
        $this->baublesOrNot();
    }

    // Les boules de Noël peuvent s'afficher ($isBaubles = TRUE) ou non.
    private function baublesOrNot() {
        if ($this->isBaubles) {
            new Baubles($this->maxStars);
        }
    }
}