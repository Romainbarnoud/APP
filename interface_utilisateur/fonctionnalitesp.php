<?php
include ("C:\wamp64\www\HUSv4\HUSv4\connexionbdd.php");
?>

<?php
if (isset($_GET['id4']) && !empty($_GET['id4'])){
  $udpate = $bdd -> query('UPDATE equipements SET Etat=0');
  header('location:interface_utilisateur.php');
} // on éteint tout

$idcategorieequipement = $bdd -> query('SELECT ID FROM categorie_equipement WHERE Nom="'.$_GET['id5'].'"');
$idcategorie = $idcategorieequipement -> fetch(); // on récupère l'ID de la catégorie équipement

if (isset($_GET['id5']) && !empty($_GET['id5'])){
  $udpate = $bdd -> query('UPDATE equipements SET Etat=0 WHERE ID_categorie_equipement="'.$idcategorie['ID'].'"');
  header('location:interface_utilisateur.php');
} // on éteint tous les équipements qui possèdent la catégorie lumière

$idcategorieequipement1 = $bdd -> query('SELECT ID FROM categorie_equipement WHERE Nom="'.$_GET['id6'].'"');
$idcategorie1 = $idcategorieequipement1 -> fetch(); // on récupère l'ID de la catégorie équipement

if (isset($_GET['id6']) && !empty($_GET['id6'])){
  $udpate = $bdd -> query('UPDATE equipements SET Etat=1 WHERE ID_categorie_equipement="'.$idcategorie1['ID'].'"');
  header('location:interface_utilisateur.php');
} // on allume tous les équipements qui possèdent la catégorie lumière
?>
