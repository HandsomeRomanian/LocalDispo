<?php

class Room {

    public $roomID;
    public $wing;
    public  $floor;
    public $number;
    public $places;
    public $type;
    // char salle;
    public  $classes = array();

    public function __construct(int $id,String $wing, int $floor, int $number, String $type, int $places) {
        $this->roomID = $id;
        $this->wing = strtoupper($wing);
        $this->floor = $floor;
        $this->number = $number;
        $this->type = $type;
        $this->places = $places;
    }

    function getNumber() {
        
        $out = "";
        if ($this->floor == 0 && (strcasecmp($this->wing,"D") || strcasecmp($this->wing,"E"))) {
            $out = $out."0";

            if ($this->number < 10) {
                $out = $out."00".$this->number;
            }
            else{
                $out = $out.$this->number;
            }

        } else if ($this->floor == 1 && (strcasecmp($this->wing,"D") || strcasecmp($this->wing,"E"))) {
            $out = $out."0";

            if ($this->number < 100) {
                if ($this->number < 10){
                    $out = $out."00".$this->number;
                }
            }
            else{
                $out = $out.$this->number;
            }

        } else {
            $out = $out.$this->floor;
        }

        return $out;
    }

    function getFull() {
        return $this->wing."-".$this->getNumber();
    }


}
?>