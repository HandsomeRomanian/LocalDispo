<?php

function connect_DB(){
    try
    {
        $bdd = new PDO('mysql:host=web.martin;dbname=schedule;charset=utf8', 'user', 'Passw0rd');
        $bdd -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $bdd;
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
}

?>
