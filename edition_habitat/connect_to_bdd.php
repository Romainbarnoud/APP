<?php
// fichier général appelé quand la connexion à la base de données est nécessaire
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=husv4;charset=utf8', 'root', '',
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); // Précise l'erreur
}

catch (Exception $e)
{
    die('Erreur :' .$e->getMessage()); // Affiche l'erreur si elle se produit
}
?>