<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/models/Classe.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/models/Room.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/models/Teacher.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/models/Group.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/models/Cours.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/models/DispoRoom.php");





class API
{

    private $link = 'http://api.martin:8088/';


    public function __construct()
    { }


    function request($string)
    {
        return json_decode(file_get_contents($this->link . $string));
    }

    function getGroup(int $id)
    {
        $response = $this->request("groups/" . $id);
        return new Group($response->groupID, $response->groupNumber, new Cours($response->cours->coursID, $response->cours->name, $response->cours->code, $response->cours->info));
    }

    function getTeacher(int $id)
    {
        $response = $this->request("teachers/" . $id);
        return new Teacher($response->teacherID, $response->teacherFirstName, $response->teacherFamName);
    }

    function getDispo()
    {
        $output = array();
        $response = $this->request("free/");
        foreach ($response as $tmp) {
            $room = new Room($tmp->room->localID, $tmp->room->wing, $tmp->room->floor, $tmp->room->number, $tmp->room->typeID, $tmp->room->places);
            array_push($output, new DispoRoom($room, $tmp->dispo, $tmp->time->hour . ":" . $tmp->time->minute));
        }
        return $output;
    }

    function getRoom(int $id)
    {
        $response =  $this->request('rooms/' .$id);
        $local = new Room($response->localID, $response->wing, $response->floor, $response->number, $response->places, $response->typeID);
        foreach ($response->classes as $tmp) {
            $classe = new Classe($tmp->classID, $tmp->startTime, $tmp->endTime, $tmp->dayID, $tmp->roomID, $tmp->teacherID, $tmp->groupID);
            $classe->teacher = new Teacher($tmp->teacher->teacherID, $tmp->teacher->teacherFirstName, $tmp->teacher->teacherFamName);
            array_push($local->classes, $classe);
        }
        return $local;
    }
}
