<?php
function listePannes() {
  $bdd = new PDO('mysql:host=localhost;dbname=husv4;charset=utf8;','root','');
  if (!isset($_GET['tri'])) {
    $_GET['tri'] = "pannes.client_id";
  }
  $sth = $bdd->prepare('SELECT pannes.*, utilisateurs.Nom FROM pannes, utilisateurs WHERE pannes.client_id = utilisateurs.ID ORDER BY '.$_GET["tri"].'');
  $sth->execute();
  return $sth;
}

function listeClients() {
    $bdd = new PDO('mysql:host=localhost;dbname=husv4;charset=utf8;','root','');
    $sth = $bdd->query('SELECT ID FROM utilisateurs');
    return $sth;
}

function getDetails() {
  $bdd = new PDO('mysql:host=localhost;dbname=husv4;charset=utf8;','root','');
  $req = $bdd->prepare('SELECT * from pannes WHERE id = ?');
  $req->execute(array(
    $_GET['id']
  ));
  return $req;
}

function editPanne() {
  $bdd = new PDO('mysql:host=localhost;dbname=husv4;charset=utf8;','root','');

  $req = $bdd->prepare('UPDATE pannes SET etat = :etat, capteur = :capteur, nbre_interventions_necessaires = :nbre_interventions_necessaires, type_panne = :type_panne ,date = :date, dates_passees = :dates_passees WHERE id = :id ');
  $req->execute(array(
  'etat' => $_POST['etat'],
  'capteur' => $_POST['capteur'],
  'nbre_interventions_necessaires' => $_POST['nbre_interventions_necessaires'],
  'type_panne' => $_POST['type_panne'],
  'date' => $_POST['date'],
  'dates_passees' => $_POST['dates_passees'],
  'id' => $_POST['id']
  ));
  return $req;
}
?>
