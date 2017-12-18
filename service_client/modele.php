<?php
function listePannes() {
  $bdd = new PDO('mysql:host=localhost;dbname=husv4;charset=utf8;','root','');
  $reponse = $bdd->query('SELECT pannes.client_id,pannes.id,pannes.date,pannes.capteur,pannes.type_panne,pannes.date_intervention,pannes.etat, utilisateurs.Nom FROM pannes, utilisateurs WHERE pannes.client_id = utilisateurs.ID ORDER BY ID DESC');
  return $reponse;
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
