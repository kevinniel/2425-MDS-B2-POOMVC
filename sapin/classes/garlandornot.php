<?php
/**
 * @author Kévin NIEL <k.niel.pro@gmail.com>
 * @copyright 2024 Kévin NIEL
 * @version 1.0.0
 */

/**
 * class GarlandOrNot
 * 
 * Manages whether we should use garlands or not
 */
class GarlandOrNot {

    /**
     * Defines whether we have garlands or not
     *
     * @var boolean
     */
    public bool $isGarland;

    /**
     * Symbol which represents garlands
     *
     * @var string
     */
    public string $garland;

    /**
     * Constructor
     *
     * @param bool $isGarland
     */
    public function __construct(bool $isGarland) {
        $this->isGarland = $isGarland;
        $this->garlandDisplay();
    }

    /**
     * Les guirlandes s'affichent toujours, elles sont des "S" lorsqu'on veut les voir ($isGarland = TRUE)
     * ou des " " lorsqu'on ne veut pas les voir ($isGarland = FALSE).
     *
     * @return string
     */
    private function garlandDisplay(): string
    {
        if($this->isGarland){
            return $this->garland = "S";
        }
        return $this->garland = " ";
    }
}