<?php

//Toujours la même fonction qui créé notre objet PDO qui nous permettra d'avoir accés à la base de données
function connexion_BD()
{
    try 
    {
        $db = new PDO("mysql:host=localhost;dbname=blogjean;charset=utf8", "root", "");
        return $db;
    } 
    catch (Exception $e) 
    {
        //die() est l'équivalent de "exit;", il arrête le script et affiche un message
        die($e->getMessage());
    }
}