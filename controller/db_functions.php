<?php
require_once("db_connect.php");
$Jours = ["Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi"];
include("../models/class.php");

function test(){
    $bdd = connect_DB();
    try{
        $request = $bdd -> prepare("SELECT COUNT(email)'count' FROM Utilisateur WHERE email=:username");
        $request ->execute(array(
            "username"=>$username
        ));
        $data = $request -> fetch();
        $request -> closeCursor();
        return ($data["count"] != 0);
    }catch (Exception $e){
        die($e->getMessage());
    }
}



?>