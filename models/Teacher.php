<?php

class Teacher{

    public $teacherID;
    public $teacherFirstName;
    public $teacherFamName;

    public function __construct(int $teacherID, string $teacherFirstName, string $teacherFamName) {
        $this->teacherID = $teacherID;
        $this->teacherFirstName = $teacherFirstName;
        $this->teacherFamName = $teacherFamName;
    }

    public function getFullName()
    {
        return $this->teacherFirstName." ".$this->teacherFamName;
    }

}

?>