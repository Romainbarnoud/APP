<?php
function afficherCGU() {
$bdd = new PDO('mysql:host=localhost;dbname=husv4;charset=utf8;','root','');
$requete = $bdd->query('SELECT * FROM conditions_generales_utilisation ORDER BY ID DESC LIMIT 1');
return $requete;
}
?>
