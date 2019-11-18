<?php

function connect_DB(){
    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=schedule;charset=utf8', 'user', 'passw0rd');
        $bdd -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $bdd;
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
}

?>
