<?php

class Cours{

    public $coursID;
    public $coursName;
    public $codeCours;
    public $coursInfo;

    public function __construct(int $coursID, string $coursName, string $codeCours, string $coursInfo) {
        $this->coursID = $coursID;
        $this->coursName = $coursName;
        $this->codeCours = $codeCours;
        $this->coursInfo = $coursInfo;
    }

}

?>