<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>HUS - Pannes</title>
    <link rel="stylesheet" href="style_panne.css">
		<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<link rel="stylesheet" href="../Mise_en_page/header.css"/>
	<link rel="stylesheet" href="../Mise_en_page/footer.css"/>
  </head>
  <body>
<!-- HEADER -->
    <header>
      <?php include("../Mise_en_page/header.html");?>
    </header>
<!-- ARIANE -->
    <div class="ariane">
      <button type="button" name="ajouter_panne" onclick="window.open('ajouter_panne.php',
                         'newwindow',
                         'width=330,height=460');
              return false;");>Ajouter une panne</button>
    </div>

<!-- LISTE DES PANNES -->
<div class="liste_pannes">
	<br>
  <h3 style="text-align:center;">LISTE DES PANNES</h3>
<br>  <ul id="navlist">
	  <li><strong>Capteur</strong></li>
    <li><strong>Date de signalement</strong></li>
    <li><strong>Type de panne</strong></li>
    <li><strong>Date d'intervention</strong></li>
    <li><strong>État de la panne</strong></li>
  </ul>
  <?php
while ($donnees = $reponse->fetch()) {
  ?>
	<a href="form_details.php?id=<?php echo $donnees['id']?>#details_panne">
<ul id="navlist">
  <li><?php echo $donnees['capteur'];?></li>
  <li><?php echo $donnees['date'];?></li>
  <li><?php echo $donnees['type_panne'];?></li>
  <li><?php echo $donnees['date_intervention'];?></li>
  <li><?php echo $donnees['etat'];?></li>
</ul> </a>
  <?php } ?>
</div>

<!-- LIVE CHAT -->
<div id="chatTab" onClick = 'pullMenu()'>Chat</div>
<div id="chat">
<?php include('chat.php')?>
<form id="chat_form" action="form_chat.php" method="post">
  <input type="text" name="message" value="">
  <input type="submit" name="" value="Envoyer">
</div>
</form>
<br>

  </body>
  <br>
  <br>
	<?php
	if(basename($_SERVER['PHP_SELF']) == "panne.php") {
		include("../Mise_en_page/footer.php");
	}
?>

<script type="text/javascript">
var current;
var pullChat = 0;
var pullMenu = function() {
	if(pullChat === 0) {
			current = document.getElementById('chatTab');
			current.style.bottom = '325px';
			current = document.getElementById('chat');
			current.style.bottom = '25px'; //starts at -300
			document.getElementById('chat_form').style.display = 'inline';
			pullChat = 1;
	}else {
		current = document.getElementById('chatTab');
		current.style.bottom = '0';
		current = document.getElementById('chat');
		current.style.bottom = '-325px';
		document.getElementById('chat_form').style.display = 'none';

		pullChat = 0;
	}
}
</script>
