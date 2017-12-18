<?php
// Modèle

function listePannes() {
  $bdd = new PDO('mysql:host=localhost;dbname=husv4;charset=utf8;','root','');
  $reponse = $bdd->prepare('SELECT id,capteur,client_id,ID_Equipement,DATE_FORMAT(date, "%d/%m/%Y") AS date, type_panne, DATE_FORMAT(date_intervention,"%d/%m/%y") AS date_intervention, etat from pannes WHERE client_id = ?');
  $reponse->execute(array($_SESSION['IDutilisateur']));
  return $reponse;
}

function detailsPanne() {
  $bdd = new PDO('mysql:host=localhost;dbname=husv4;charset=utf8;','root','');
  $req = $bdd->prepare('SELECT * from pannes WHERE id = ?');
  $req->execute(array(
    $_GET['id']
  ));
  return $req;
}

function login() {
  $bdd = new PDO('mysql:host=localhost;dbname=husv4;charset=utf8;','root','');
  $request = $bdd->prepare('SELECT * from users WHERE email = ?');
  $request->execute(array($_POST['email']));
  return $request;
}

function insertPanne() {
  $bdd = new PDO('mysql:host=localhost;dbname=husv4;charset=utf8;','root','');

  $req = $bdd->prepare('INSERT INTO pannes(client_id,capteur,date,type_panne,etat,date_intervention,nbre_interventions_necessaires,dates_passees,ID_Equipement) VALUES(:client_id,:capteur,:date,:type_panne,:etat,:date_intervention,:nbre_interventions_necessaires,:dates_passees,:ID_Equipement)');
  $req2=$bdd->query('SELECT ID FROM equipements WHERE Nom="'.$_POST['capteur'].'"');
  $equ=$req2->fetch();
  $req->execute(array(

  'client_id'=>$_SESSION['IDutilisateur'],
  'capteur'=>$_POST['capteur'],
  'date'=>$_POST['date'],
  'type_panne'=>$_POST['type_panne'],
  'etat'=>'en attente',
  'date_intervention'=>date('Y-m-d'),
  'nbre_interventions_necessaires'=>0,
  'dates_passees'=>0,
  'ID_Equipement'=>$equ['ID']
  ));
  return $req;
}

function listeEquipements() {
  $bdd = new PDO('mysql:host=localhost;dbname=husv4;charset=utf8;','root','');
  $req = $bdd->query('SELECT  Nom FROM equipements');
  return $req;
}
?>
