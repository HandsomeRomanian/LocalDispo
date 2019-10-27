<?php
require_once("../controller/functions.php");
require_once("../models/Class.php");

$response =  json_decode(file_get_contents('http://192.168.0.190:8080/classes/10'),true);
//$freeTest = json_decode(file_get_contents('http://192.168.0.190:8080/free'),true);
//echo $_GET['local'].'<br>';
$classes[] = array();
foreach ($response as $tmp) {
    //array_push($classes,new Classe($tmp['classID'],$tmp['startTime'],$tmp['endTime'],$tmp['dayID'],$tmp['roomID'],$tmp['teacherID'],$tmp['groupID']));
    echo substr($tmp['startTime'], 0, 5) + 12;
    echo '<br>';
    echo $classes[1]->endTime;
}

// foreach ($freeTest as $tmp){
//     echo getNumber($tmp['room']);
// }
// echo $classes[1]->classID;

?>