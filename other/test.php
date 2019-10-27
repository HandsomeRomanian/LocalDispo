<?php

$response =  json_decode(file_get_contents('http://192.168.0.190:8080/classes/10'),true);
echo file_get_contents('http://192.168.0.190:8080/classes/10').'<br>';
echo $_GET['local'].'<br>';
echo $response->{'0'}->classID;
Classe classe = new Classe(); 
foreach ($response as $tmp) {
    echo $tmp['classID'];
    if ($tmp->classID == $_GET['local']){
        echo 'GOOD '.$tmp['classID'];
    }

}


?>