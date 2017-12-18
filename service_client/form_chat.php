<?php
session_start();
  $bdd = new PDO('mysql:host=localhost;dbname=husv4;charset=utf8;','root','');

$req = $bdd->prepare("INSERT INTO chat(user_sender,user_receiver,message) VALUES(:user_sender,:user_receiver,:message)");
$req->execute(array(
'user_sender' => '0',
'user_receiver' => $_POST['id_receiver'],
'message' => $_POST['message']
));
header('location:chat.php?id='.$_POST['id_receiver']);
?>
