<?php

include_once dirname(__FILE__) . '/../classes/main.php';

class MaxStarsService {
    
    public static function getMaxStarNumber() {
        return (3 + 2*(TreeConfig::$rowNumber - 1))*2 + 1;
    }

}