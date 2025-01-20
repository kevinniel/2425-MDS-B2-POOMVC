<?php

class Main {    
    public function __construct() {
        new XmasTree();   
    }
}

class XmasTree {
    private $rowNumber = 6;
    private $branch1 = 1;
    private $branch2 = 3;
    private $branch3 = 7;
    private $baubleHeight;
    private $isBaubles = TRUE;
    private $isGarland = TRUE;
    private $maxStars;
    
    public function __construct() {
        
        $rowNumber = $this->rowNumber;
        $branch1 = $this->branch1;
        $branch2 = $this->branch2;
        $branch3 = $this->branch3;
        $maxStars = $this->getMaxStarNumber();
        $isGarland = $this->isGarland;
        $isBaubles = $this->isBaubles;
        $baubleHeight = $this->baubleHeightCompensation();
        
        new TreeBody($rowNumber, $branch1, $branch2, $branch3, $maxStars, $isGarland);
        new BaublesOrNot($isBaubles, $maxStars, $baubleHeight);
        new Trunk($rowNumber, $maxStars, $baubleHeight);
    }

    // Nombre maximum de "*" par branche en fonction du nombre de rangs saisi dans $rowNumber.
    private function getMaxStarNumber() {
        return (3 + 2*($this->rowNumber - 1))*2 + 1;
    }

    // Compensation de la hauteur des boules de Noël (2 lignes) sur la hauteur totale du tronc,
    // en fonction de si elles s'affichent ($isBaubles = TRUE) ou non.
    private function baubleHeightCompensation() {
        if($this->isBaubles) {
            return 0;
        }
        return 2;

    }
}

class GarlandOrNot {
    public function __construct($isGarland) {
        $this->isGarland = $isGarland;
        $this->garlandDisplay();
    }

    // Les guirlandes s'affichent toujours, elles sont des "S" lorsqu'on veut les voir ($isGarland = TRUE)
    // ou des " " lorsqu'on ne veut pas les voir ($isGarland = FALSE).
    private function garlandDisplay() {
        if($this->isGarland){
            return $this->garland = "S";
        }
        return $this->garland = " ";
    }
}

class TreeBody {
    private $garland;

    public function __construct($rowNumber, $branch1, $branch2, $branch3, $maxStars, $isGarland) {
        $this->rowNumber = $rowNumber;
        $this->branch1 = $branch1;
        $this->branch2 = $branch2;
        $this->branch3 = $branch3;
        $this->maxStars = $maxStars;
        $this->isGarland = $isGarland;

        $garlandOrNot = new GarlandOrNot($isGarland);
        $this->garland = $garlandOrNot->garland;

        $this->treeBodyDisplay($rowNumber, $maxStars);
    }
    
    private function branches($branch) {
        $mainBranches = "<pre style = 'margin: 0;'>";
        $mainBranches .= str_repeat(" ", ($this->maxStars - $branch) / 2 + 1);
        $mainBranches .= str_repeat("*", $branch);
        $mainBranches .= str_repeat(" ", ($this->maxStars - $branch) / 2 + 1);
        $mainBranches .= "</pre>";
        return $mainBranches;
    }

    // Les tailles des trois branches s'incrémentent, celle du bas ($bottowRow) est systématiquement la plus longue et reçoit une guirlande.
    private function treeBodyDisplay($rowNumber, $maxStars) {
        for($i = 0; $i <= $this->rowNumber - 1; $i++){
        $topRow = $this->branches($this->branch1);
        $middleRow = $this->branches($this->branch2);
        
        $bottomRow = "<pre style = 'margin: 0;'>";
        $bottomRow .= str_repeat(" ", ($this->maxStars - $this->branch3) / 2);
        $bottomRow .= $this->garland;
        $bottomRow .= str_repeat("*", $this->branch3);
        $bottomRow .= $this->garland;
        $bottomRow .= str_repeat(" ", ($this->maxStars - $this->branch3) / 2);
        $bottomRow .= "</pre>";
        
        echo $topRow;
        echo $middleRow;
        echo $bottomRow;
        
        $this->branch1 = $this->branch2;
        $this->branch2 = $this->branch3;
        $this->branch3 += 4;
        } 
    }

}

class Baubles {
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

class BaublesOrNot {
    public function __construct($isBaubles, $maxStars, $baubleHeight) {
        $this->isBaubles = $isBaubles;
        $this->maxStars = $maxStars;
        $this->baubleHeight = $baubleHeight;
        $this->baublesOrNot();
    }

    // Les boules de Noël peuvent s'afficher ($isBaubles = TRUE) ou non.
    private function baublesOrNot() {
        if ($this->isBaubles) {
            new Baubles($this->maxStars);
        }
    }
}

class Trunk {
    public function __construct ($rowNumber, $maxStars, $baubleHeight){
        $this->rowNumber = $rowNumber;
        $this->maxStars = $maxStars;
        $this->baubleHeight = $baubleHeight;

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

}

new Main();