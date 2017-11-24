//connexion à la BDD hus
<?php

$bdd = new PDO('mysql:host=localhost:8889;dbname=hus;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

?>
