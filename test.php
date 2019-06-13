<?php

include("controller/functions.php");
$json_output = json_decode(file_get_contents("json/local.json"));
 
echo '{"Locals" : [';
    foreach ($json_output->Locals as $tmp) {
        echo '{ <br>"Emplacement" : '.$tmp->Emplacement.',<br>"Jours" : [';
            for ($i=0; $i < 5; $i++) { 
                echo '{ <br>"Cours" : <br>[';
                    foreach ($tmp->Jours[$i]->Cours as $key) {
                        echo '{ "Nom" : "'.$key->Nom.'",
                            "Prof" : "'.$key->Prof.'",<br>
                            "Start" : "'.$key->Start.'",<br>
                            "End" : "'.$key->End.'",<br>
                            "ID" : "'.$key->ID.'"<br>
                            },';
                    }
                    if($i < 4){
                        echo ",";
                    }
                    else{
                        echo "]";
        
                    }
            }
                
    }
?>