<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=husv4;charset=utf8;','root','');

// VERIFIER QUE LA REQUÊTE EST JUSTE
// On ne veut pas que l'utilisateur entre un message vide

if (isset($_POST['message']) && strlen($_POST['message']) > 0) {
    $req = $bdd->prepare("INSERT INTO chat(user_sender,user_receiver,message) VALUES(:user_sender,:user_receiver,:message)");
    $req->execute(array(
    'user_sender' => $_SESSION['IDutilisateur'],
    'user_receiver' => '0',
    'message' => $_POST["message"]
    ));
    header('location:panne.php');
}else {
  $erreur = "le message ne peut être vide";
  echo $erreur;
}?>
