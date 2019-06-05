<?php
$Jours = ["Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi"];

function getDispo($jour, $numeroLocal){
    $json_output = json_decode(file_get_contents("json/local.json"));
    
    $dispo = array();
    
    foreach ($json_output->Locals as $tmp) {
        if ($tmp->Emplacement == $numeroLocal){
            $Local = $tmp;
        }
    }
    for ($i=0; $i < count($Local->Jours[2]->Cours) ; $i++) { 
        if ($Local->Jours[$jour]->Cours[$i]->Start != "08:00"){
            array_push($dispo,"08:00");
        }
        if ($i == 0 && $dispo[count($dispo)-1] != $Local->Jours[$jour]->Cours[$i]->Start)
        {
            $useless = 1;
        }
        if ($i != 0 && $Local->Jours[$jour]->Cours[$i]->Start != $Local->Jours[$jour]->Cours[$i-1]->End){
            $useless = 1;            
            //array_push()
        }
    }
    
    return $dispo;
}

function checkFree($numeroLocal){
    
    if(date("N")-1<=6){
        return true;
    }
    $json_output = json_decode(file_get_contents("json/local.json"));
    $checkLocal = getLocalByNumero($numeroLocal);
    $checkLocal = $checkLocal->Jours[date("N")-1];
    $dispo = true;
    foreach ($checkLocal->Cours as $checkCours) {
        # code...
        if($checkCours->Start <= date("H:i") && $checkCours->End >= date("H:i")){
            $dispo = false;
        }
    }
    return $dispo;
}

function getLocalByNumero($numeroLocal){

    $json_output = json_decode(file_get_contents("json/local.json"));
    foreach ($json_output->Locals as $tmp) {
        if ($tmp->Emplacement == $numeroLocal){
            return $tmp;
        }
    }
}

function getDuration($start, $end){
    if($start > $end){
        $end+=12;
    }
    return ($end-$start);
}

function FunctionName(String $startTime,String $endTime)
{
        
}
?>