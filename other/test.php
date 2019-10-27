<?php

$response =  json_decode(file_get_contents('http://192.168.0.190:8080/classes/10'),true);
echo file_get_contents('http://192.168.0.190:8080/classes/10');
echo $_GET['local'];
echo $response;
foreach ($response->classID as $tmp) {
    echo 'allo';
    echo $tmp;
    echo $tmp->classID;
    if ($tmp->classID == $_GET['local']){
        echo 'GOOD '.$tmp->classID;
    }

}


?>