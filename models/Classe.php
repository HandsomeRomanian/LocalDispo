<?php

class Classe {

    public $classID;
    public $startTime;
    public $endTime;
    public $dayID;
    public $roomID;
    public $teacher;
    public $teacherID;
    public $group;
    public $groupID;

    public function __construct(int $classID, string $startTime, string $endTime, int $dayID, int $localID, int $teacherID, int $groupID) {
        $this->classID = $classID;
        if (substr($startTime,0,2) != "12" && substr($startTime,-2) == 'PM'){
            $this->startTime = substr($startTime, 0, 2) + 12;
            $this->startTime = $this->startTime.":".substr($startTime, 3, 2);
        }
        else{
            $this->startTime = substr($startTime, 0, 5);
        }
        if (substr($endTime,0,2) != "12" && substr($endTime,-2) == 'PM'){
            $this->endTime = substr($endTime, 0, 2) + 12;
            $this->endTime = $this->endTime.":".substr($endTime, 3, 2);
            
        }
        else{
            $this->endTime = substr($endTime, 0, 5);
        }
        $this->dayID = $dayID;
        $this->roomID = $localID;
        $this->teacherID = $teacherID;
        $this->groupID = $groupID;

    }

    function getDuration(){
        $end = substr($this->endTime, 0, 2);
        $start = substr($this->startTime, 0, 2);
        return $end - $start;
    }

    function parseStart(){        
        return substr($this->startTime,0,2) - 8;
    }

}
