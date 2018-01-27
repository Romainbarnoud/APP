<?php
$bdd = new PDO('mysql:host=localhost;dbname=husv4;charset=utf8', 'root', '');
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
// if (isset($_GET['id3']) && !empty($_GET['id3'])){
//   $delete = $bdd -> query('DELETE FROM utilisateurs WHERE ID="'.$_GET['id3'].'"');
//   header('location:appcapteurs.php');
// }
// if (isset($_GET['id8']) && !empty($_GET['id8'])){
//   $delete = $bdd -> query('DELETE FROM categorie_equipement WHERE ID="'.$_GET['id8'].'"');
//   header('location:appcapteurs.php');
// }
?>
