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

function checkFree($Local){
    
    if(date("N")-1>=5){
        return true;
    }
    $checkLocal = $Local->Jours[date("N")-1];
    $dispo = true;
    foreach ($checkLocal->Cours as $checkCours) {
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

function nextClassTime($Local)
{
  $day = date("N")-1;
  $time = date("H:i");
  foreach ($Local->Jours[$day]->Cours as $key) {
      if($time < $key->Start){
          return $key->Start;
      }
  }
  $day++;
  foreach ($Local->Jours[$day]->Cours as $key) {
          return '00:00';
  }


}
?>