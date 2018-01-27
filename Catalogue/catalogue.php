<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="stylecata.css">
        <link rel="stylesheet" href="../Mise_en_page/header.css"/>
        <link rel="stylesheet" href="../Mise_en_page/footer.css"/>
	</head>

	<body>
    <header>
      <?php include("../Mise_en_page/header.html");?>
    </header>
	<h1>Catalogue des equipements</h1>
	<div id="menucatalogue">
		<h4>Filtre type des equipements :</h4>
		<form method="post" action="option.php">  <!-- Cr�ation du formulaire pour le filtre -->
		<select name="choix">
    		<option value="3">Température</option> <!-- Les Differents choix possible -->
    		<option value="2">Luminosité</option>
    		<option value="4">Confort</option>
    		<option value="1">Sécurité</option>
    		<option value="7">Consommation</option>
    		<option value="5">Sans_categorie</option>
    		 <input type="submit" value="Valider" />
		</select>
		</form>

		<h4>Filtre Categorie des equipements :</h4>
		<form method="post" action="type.php">  <!-- Cr�ation du formulaire pour le filtre -->
		<select name="type">
    		<option value="1">Capteur</option> <!-- Les Differents choix possible -->
    		<option value="2">Actionneur</option>
    		<option value="3">Cemac</option>
    		 <input type="submit" value="Valider" />
		</select>
		</form>

		<h4>Choisir capteur</h4>
		<form method="post" action="barrederecherche.php"> <!-- Cr�ation du formulaire pour la barre de recherche -->
		nom du capteur:<input type="text" name="capteur">
		<input type="submit" name="envoi" value="envoi">
	</form>
        </div>
        <?php
        $bdd = new PDO('mysql:host=localhost;dbname=husv4;charset=utf8', 'root', ''); // Cherche la bdd
        $reponse = $bdd->query('SELECT * FROM equipements_proposes_par_domisep');
        while ($donnees = $reponse->fetch()) // Liste de tout les capteurs de la BDD
        {
            echo "<p>".$donnees['Nom']."</p>".$donnees['Caracteristiques'].'<br/>'  ;
            echo "<img src="  .  $donnees['Lien_image']  . ">";
            echo "<button class='button1'>Commander</button>";
        }
        $reponse->closeCursor();
        ?>
        <footer>
    			<?php include("../Mise_en_page/footer.php");?>
    		</footer>
        <body>
