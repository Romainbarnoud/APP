<div class="chat">
<?php
  $bdd = new PDO('mysql:host=localhost;dbname=husv4;charset=utf8;','root','');
$chat = $bdd->prepare('SELECT chat.date, users.nom ,chat.message FROM users, chat WHERE users.client_id = chat.user_sender AND (chat.user_sender = ? OR chat.user_receiver = ? )ORDER BY date');
$chat->execute(array($_SESSION['IDutilisateur'],$_SESSION['IDutilisateur']));
while ($data = $chat->fetch()) {
  echo $data['nom']," : ",$data['message']; ?>
<br>
<?php
}
?>
</div>
