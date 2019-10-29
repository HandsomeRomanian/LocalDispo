<?php

class DispoRoom{

    public $room;
    public $dispo;
    public $time;

    public function __construct(Room $room, bool $dispo, string $time) {
        $this->room = $room;
        $this->dispo = $dispo;
        $this->time = $time;
    }

    function isToday()
    {
        if ($this->time < "23:00"){
            return true;
        }
        else{
            return false;
        }
    }

}

?>