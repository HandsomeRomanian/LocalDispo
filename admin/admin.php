<?php
require_once("../controller/db_connect.php");
require_once("../models/Classe.php");
require_once("../models/Group.php");
require_once("../models/Group.php");


function createGroup($groupNumber, $classeID){
    $bdd = connect_DB();
    try {
        $req = $bdd->prepare('INSERT INTO `Group`(`groupNumber`, `coursID`) 
                                VALUES (:groupNum,:coursID)');
        $req->execute(array(
            'groupNum' => $groupNumber,
            'coursID' => $classeID
        ));
        return $id = $bdd->lastInsertId();
    }
    catch(Exception $e){die('Erreur : '.$e->getMessage());}
}

function createClass($startTime, $endTime, $dayID, $localID, $teacherID,$groupID){
    $bdd = connect_DB();
    try {
        $req = $bdd->prepare('INSERT INTO `Group`(`groupNumber`, `coursID`) 
                                VALUES (:groupNum,:coursID)');
        $req->execute(array(
            'groupNum' => $groupNumber,
            'coursID' => $classeID
        ));
        return $id = $bdd->lastInsertId();
    }
    catch(Exception $e){die('Erreur : '.$e->getMessage());}
}

?>
