<?php
$bdd=new PDO('mysql:host=localhost;dbname=husv4;charset=utf8','root','') ;
if (isset($_GET['id1']) && !empty($_GET['id1'])){
    $udpate = $bdd -> query('UPDATE equipements SET Etat=1 WHERE ID="'.$_GET['id1'].'"');
    header('location:piece.php');
}
if (isset($_GET['id2']) && !empty($_GET['id2'])){
    $udpate = $bdd -> query('UPDATE equipements SET Etat=0 WHERE ID="'.$_GET['id2'].'"');
    header('location:piece.php');
}
?>