<?php

include_once dirname(__FILE__) . '/../services/maxstarservice.php';
include_once dirname(__FILE__) . '/../config/treeconfig.php';
include_once dirname(__FILE__) . '/../classes/treebody.php';
include_once dirname(__FILE__) . '/../classes/baublesornot.php';
include_once dirname(__FILE__) . '/../classes/trunk.php';

class XmasTree {

    private $maxStars;
    
    public function __construct() {
        $this->maxStars = MaxStarsService::getMaxStarNumber();
        $this->drawTree();
    }

    private function drawTree() {
        new TreeBody($this->maxStars);
        new BaublesOrNot($this->maxStars);
        new Trunk($this->maxStars);
    }

}