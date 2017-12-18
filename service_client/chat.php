<?php

  $bdd = new PDO('mysql:host=localhost;dbname=husv4;charset=utf8;','root','');
?>
<form class="receiver" action="chat.php?id=<?php $_GET['id'] ?>" method="GET">
  <input type="text" name="id" value="<?php echo $_GET['id'] ?>" style="width:60px;">
  <input type="submit" name="" value="Selectionner">
</form>
<div class="chat">
<?php

$request = $bdd->prepare('SELECT chat.date, users.nom ,chat.message FROM users, chat WHERE users.client_id = chat.user_sender AND (chat.user_sender = ? OR chat.user_receiver = ? ) ORDER BY date');
$request->execute(array($_GET['id'],$_GET['id']));
while ($data = $request->fetch()) {
  echo $data['date']," ",$data['nom']," ",$data['message']; ?>
<br>
<?php
}
?>
<form class="chat_form" action="form_chat.php" method="post">
<input type="text" name="message" value="" style="width:300px;">
<input type="text" name="id_receiver" value="<?php echo $_GET['id']?>" style="display:none;">
<input type="submit" name="" value="Envoyer">
</form>
</div>

<style media="screen">
.chat {
  font-family: Tahoma;
  position:relative;
  width:500px;
  height:470px;
  margin: 0 auto;
  top:5%;
  border: 1px solid black;
}
.chat_form {
  position:absolute;
  bottom:0;
  margin: 0 auto;
  left:15%;
}
.receiver {
  position: relative;
  left:45%;
}
</style>
