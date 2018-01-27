<?php
require('modele.php');
$reponse = listePannes();
$requete1 = listeClients();
require('vue_panne.php');
?>
