<?php

include_once dirname(__FILE__) . '/../config/treeconfig.php';
include_once dirname(__FILE__) . '/../classes/garlandornot.php';

class TreeBody {
    private $garland;
    public $rowNumber;
    public $branch1;
    public $branch2;
    public $branch3;
    public $maxStars;
    public $isGarland;

    public function __construct($maxStars) {
        $this->rowNumber = TreeConfig::$rowNumber;
        $this->branch1 = TreeConfig::$branch1;
        $this->branch2 = TreeConfig::$branch2;
        $this->branch3 = TreeConfig::$branch3;
        $this->maxStars = $maxStars;
        $this->isGarland = TreeConfig::$isGarland;

        $garlandOrNot = new GarlandOrNot(TreeConfig::$isGarland);
        $this->garland = $garlandOrNot->garland;

        $this->treeBodyDisplay(TreeConfig::$rowNumber, $maxStars);
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