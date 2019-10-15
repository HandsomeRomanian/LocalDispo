<?php
header("Content-Type: application/json; charset=UTF-8");
$myObj->name = "John";
$myObj->age = 30;
$myObj->city = "New York";
$myObj->list = array(array('coffee', 'brown', 'caffeine'), 'brown', 'caffeine');

$myJSON = json_encode($myObj);

echo $myJSON;
?>