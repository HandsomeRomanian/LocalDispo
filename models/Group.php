<?php
require_once("Cours.php");

class Group{

    public $groupID;
    public $groupNumber;
    public $cours;

    public function __construct(int $groupID, int $groupNumber, Cours $cours) {
        $this->groupID = $groupID;
        $this->groupNumber = $groupNumber;
        $this->cours = $cours;
    }

}

?>