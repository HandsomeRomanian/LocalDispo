<?php
require_once("../models/Cours.php");
require_once("../models/Group.php");
require_once("../models/Room.php");
require_once("../models/Classe.php");

function getGroup(int $id): Group
{
    $response =  json_decode(file_get_contents('http://192.168.0.190:8080/groups/' . $id), true);
    $output = new Group($response['groupID'],$response['groupNumber'],new Cours($response['cours']['coursID'],$response['cours']['name'],$response['cours']['code'],$response['cours']['info']));
    return $output;
}



?>