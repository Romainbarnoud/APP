<?php
include ("C:\wamp64\www\HUSv4\HUSv4\connexionbdd.php");
if (isset($_GET['id1']) && !empty($_GET['id1'])){
    $udpate = $bdd -> query('UPDATE equipements SET Etat=1 WHERE ID="'.$_GET['id1'].'"');
    header('location:interface_utilisateur.php');
}
if (isset($_GET['id2']) && !empty($_GET['id2'])){
    $udpate = $bdd -> query('UPDATE equipements SET Etat=0 WHERE ID="'.$_GET['id2'].'"');
    header('location:interface_utilisateur.php');
}
?>
