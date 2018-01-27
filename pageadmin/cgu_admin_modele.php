<?php
function afficherCGU() {
  $bdd = new PDO('mysql:host=localhost;dbname=husv4;charset=utf8;','root','');
  $requete = $bdd->query('SELECT * FROM conditions_generales_utilisation ORDER BY ID DESC LIMIT 1 ');
  return $requete;
}

function modifierCGU() {
  $bdd = new PDO('mysql:host=localhost;dbname=husv4;charset=utf8;','root','');
  $requete = $bdd->prepare('INSERT INTO conditions_generales_utilisation(Contenu,Date_de_derniere_modification,Date_de_mise_en_ligne) VALUES(:Contenu,NOW(),:Date_de_mise_en_ligne)');
  $requete->execute(array(
    'Contenu' => $_POST['Contenu'],
    'Date_de_mise_en_ligne' => date('Y-m-d')
  ));
  header('pageadmin/appadmin.php');
}
?>
