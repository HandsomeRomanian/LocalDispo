<?php

include("controller\\functions.php");

$json_output = json_decode(file_get_contents("json/local.json"));
    

foreach ($json_output->Locals as $tmp) {
    if(checkFree($tmp->Emplacement)){
        echo $tmp->Emplacement;
        echo " est disponible";
        
    }
}


?>