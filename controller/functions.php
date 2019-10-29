<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/models/Classe.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/models/Room.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/models/Teacher.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/models/Group.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/models/Cours.php");
define("API_LINK", 'http://192.168.0.190:8080/');


function getAPI($string)
{
    return json_decode(file_get_contents(API_LINK . $string));
}


function getGroup(int $id)
{
    $response =  getAPI("groups/" . $id);
    return new Group($response->groupID, $response->groupNumber, new Cours($response->cours->coursID, $response->cours->name, $response->cours->code, $response->cours->info));
}

function getTeacher(int $id)
{
    $response = getAPI("teachers/" . $id);
    return new Teacher($response->teacherID, $response->teacherFirstName, $response->teacherFamName);
}

?>
