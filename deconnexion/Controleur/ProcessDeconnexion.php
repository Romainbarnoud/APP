<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=husv4;charset=utf8', 'root', '');
$bdd->query('UPDATE utilisateurs SET Etat_connexion = "0" WHERE ID = "'.$_SESSION['IDutilisateur'].'"'); //etat de l'utilisateur actualisé comme "déconnecté" dans la bdd
session_destroy();
include('../../connexion/Vue/VueConnexion.php'); //retour à la page d'acceuil avant connection

?>