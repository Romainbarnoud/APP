<?php
// CONTROLEUR DE LA PAGE PANNES
session_start();
// Modèle
require('modele.php');
$reponse = listePannes();
// Affichage
require('vue_panne.php'); ?>
