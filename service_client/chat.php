<?php

  include ("../connexionbdd.php");
?>
<form class="receiver" action="chat.php?id=<?php $_GET['id'] ?>" method="GET">
<select class="" name="id">
    <?php
        $requete1 = $bdd->query('SELECT ID, Nom FROM utilisateurs');
     while ($donnees=$requete1->fetch()) { ?>
    <option value="<?php echo  $donnees['ID'] ?> "> <?php echo $donnees['Nom'] ?> </option>
  <?php  } ?>
</select>
   <!--<input type="text" name="id" value="<?php // echo $_GET['id'] ?>" style="width:60px;"> -->
  <input type="submit" name="" value="Selectionner">
</form>
<div class="chat">
<?php
$request = $bdd->prepare('SELECT chat.date, utilisateurs.Nom ,chat.message FROM utilisateurs, chat WHERE utilisateurs.ID = chat.user_sender AND (chat.user_sender = ? OR chat.user_receiver = ? ) ORDER BY date');
$request->execute(array($_GET['id'],$_GET['id']));
while ($data = $request->fetch()) {
  echo $data['date']," ",$data['Nom']," ",$data['message']; ?>
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
