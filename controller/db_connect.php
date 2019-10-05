<?php

function connect_DB(){
    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=locals;charset=utf8', 'dev_auth', 'Passw0rd');
        $bdd -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $bdd;
    }
    catch(Exception $e)
    {
        // En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
    }
}

?>