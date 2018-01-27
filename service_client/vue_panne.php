<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title> HUS - Service Client</title>
    <link rel="stylesheet" href="style_panne_client.css">
    <link rel="stylesheet" href="../Mise_en_page/header.css"/>
  </head>
  <body>
<!-- HEADER -->
    <header>
      <div id="entete">
            <div class="logo">
                <a href="lien"><img src="../Mise_en_page/Logo.png"></a>
            </div>
            <div class="nom">
                <a href="lien">H   U   S</a>
            </div>
            <div class="BoutonDeconnexion">
                <a href="../deconnexion/Controleur/ProcessDeconnexion.php" class="TextDeconnexion">Déconnexion</a>
            </div>
    	</div>
    </header>
<!-- ARIANE -->
    <div class="ariane">
      <button type="button" name="CHAT"  onclick="window.open('chat.php?id=0',
                         'newwindow',
                         'width=550,height=550');
              return false;">CHAT</button>
    </div>

<!-- LISTE DES PANNES -->
<div class="liste_pannes">
  <h3 style="text-align:center;">"LISTE DES PANNES"</h3>

<h3>TRIER PAR</h3>

<form action="panne_service_client.php" method="GET">
  <select name="tri">
    <option value="pannes.client_id ASC">ID CLIENT (CROISSANT)</option>
    <option value="pannes.date DESC">DATE (DECROISSANT)</option>
    <option value="utilisateurs.Nom ASC">NOM (CROISSANT)</option>
    <option value="pannes.etat ASC">ÉTAT (CROISSANT)</option>
  </select>
<input type="submit" name="">
</form>
  <ul id="navlist">
	  <li><strong>ID client</strong></li>
	  <li><strong>Nom</strong></li>
    <li><strong>ID Équipement</strong></li>
	  <li><strong>Équipement</strong></li>
    <li><strong>Date de signalement</strong></li>
    <li><strong>Type de panne</strong></li>
    <li><strong>Date d'intervention</strong></li>
    <li><strong>État de la panne</strong></li>
  </ul>
  <div class="sousListePannes">
  <?php
while ($donnees = $reponse->fetch()) {
  ?>
	<a href="form_details_service_client.php?id=<?php echo $donnees['id']?>#details_panne">
<ul id="navlist">
  <li><?php echo $donnees['client_id'];?></li>
  <li><?php echo $donnees['Nom'];?></li>
  <li><?php echo $donnees['ID_Equipement'];?></li>
  <li><?php echo $donnees['capteur'];?></li>
  <li><?php echo $donnees['date'];?></li>
  <li><?php echo $donnees['type_panne'];?></li>
  <li><?php echo $donnees['date_intervention'];?></li>
  <li><?php echo $donnees['etat'];?></li>
</ul> </a>
  <?php } ?>
</div>
</div>
  </body>
