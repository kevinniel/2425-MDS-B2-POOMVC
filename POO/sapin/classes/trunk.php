<?php

include_once dirname(__FILE__) . '/../config/treeconfig.php';

class Trunk {

    public $rowNumber;
    public $maxStars;
    public $baubleHeight;

    public function __construct ($maxStars){
        $this->rowNumber = TreeConfig::$rowNumber;
        $this->maxStars = $maxStars;
        $this->baubleHeight = $this->baubleHeightCompensation();;

        $this->trunkDisplay();
    }

    private function trunk() {
        $mainStarLines = "<pre style = 'margin: 0;'>";
        $mainStarLines .= str_repeat(" ", ($this->maxStars - 1) / 2);
        $mainStarLines .= str_repeat("*", 3);
        $mainStarLines .= str_repeat(" ", ($this->maxStars - 3) / 2);
        $mainStarLines .= "</pre>";
        return $mainStarLines;
    }
    
    // Le tronc fait la même hauteur, que les boules de Noël s'affichent ($isBaubles = TRUE) ou non, grâce à  la hauteur de compensation
    // des boules de Noël (0 si elles s'affichent, 2 dans le cas contraire (fonction baubleHeightCompensation dans la classe XmasTree).
    private function trunkDisplay() {
        for($i = 0; $i < $this->rowNumber + $this->baubleHeight ; $i++){
            echo($this->trunk());
        }
    }

    private function baubleHeightCompensation() {
        if(TreeConfig::$isBaubles) {
            return 0;
        }
        return 2;
    }

}