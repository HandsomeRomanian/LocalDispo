<?php
require_once("controller/API.php");
$API = new API();
$DispoRoom = new DispoRoom(1, true,"12:00");

if ($DispoRoom->isToday()){
    echo "yes";
}
else {
    echo "no";
}

?>