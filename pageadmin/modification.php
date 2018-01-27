<?php
include ("C:\wamp64\www\HUSv4\HUSv4\connexionbdd.php");
// $data = array(); // Du fetchAll(); ?>

<?php
if (isset($_GET['id']) && !empty($_GET['id'])){
  $delete = $bdd -> query('DELETE FROM equipements WHERE ID="'.$_GET['id'].'"');
  header('location:appcapteurs.php');
}
if (isset($_GET['id1']) && !empty($_GET['id1'])){
  $udpate = $bdd -> query('UPDATE equipements SET Etat=1 WHERE ID="'.$_GET['id1'].'"');
  header('location:appcapteurs.php');
}
if (isset($_GET['id2']) && !empty($_GET['id2'])){
  $udpate = $bdd -> query('UPDATE equipements SET Etat=0 WHERE ID="'.$_GET['id2'].'"');
  header('location:appcapteurs.php');
}
if (isset($_GET['id3']) && !empty($_GET['id3'])){
  $delete = $bdd -> query('DELETE FROM utilisateurs WHERE ID="'.$_GET['id3'].'"');
  $delete = $bdd -> query('DELETE FROM lien_utilisateur_habitat WHERE ID_Utilisateur="'.$_GET['id3'].'"');
  header('location:appadmin.php');
}
if (isset($_GET['id4']) && !empty($_GET['id4'])){
  $delete = $bdd -> query('DELETE FROM habitat WHERE ID="'.$_GET['id4'].'"');
  header('location:appadmin.php');
}
if (isset($_GET['id5']) && !empty($_GET['id5'])){
  $delete = $bdd -> query('DELETE FROM ville WHERE ID="'.$_GET['id5'].'"');
  header('location:appadmin.php');
}
if (isset($_GET['id6']) && !empty($_GET['id6'])){
  $delete = $bdd -> query('DELETE FROM pays WHERE ID="'.$_GET['id6'].'"');
  header('location:appadmin.php');
}
if (isset($_GET['id7']) && !empty($_GET['id7'])){
  $delete = $bdd -> query('DELETE FROM type_equipement WHERE ID="'.$_GET['id7'].'"');
  header('location:appadmin.php');
}
if (isset($_GET['id8']) && !empty($_GET['id8'])){
  $delete = $bdd -> query('DELETE FROM categorie_equipement WHERE ID="'.$_GET['id8'].'"');
  header('location:appadmin.php');
}
?>
