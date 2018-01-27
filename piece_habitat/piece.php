<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8" />
        <title>HUS - Piece</title>
        <link rel="stylesheet" href="style.css"/>
        <link rel="stylesheet" href="../Mise_en_page/header.css"/>
        <link rel="stylesheet" href="../Mise_en_page/footer.css"/>
    </head>

    <body>
     	<header>
    		<?php include("../Mise_en_page/header.html");?>
    	</header>
    	<!-- adapter la taille du cadre en fonction du nombre de pièces -->
		<?php include("variables.php");?>

		<h1 class="cadre" id="titre_piece"><?php echo $piece['Nom'] ;?></h1>
		<!--Affichage des equipements-->
    	<section class="cadre" style="height : <?php echo $taille_cadre_equipement; ?>px ;">
		    <?php include("affichage_equipements.php");?>
    	</section>

        <!--Infos piece--> 
        <h1 class="cadre" id="titre_infos">Informations Salon</h1>
    	<section class="cadre" id="cadre_infos" style="height : <?php echo $taille_2_cadres; ?>px ;"> 
   		<div class="infos" id="premiere_info">Température : 21°C</div>
   		<div class="infos">Surface : 30 m²</div>
   		
    	</section>
    	    	
    	<!-- Pannes -->
    	<h1 class="cadre" id="titre_pannes" style="margin-top: <?php echo $margin_top_pannes; ?>px ;">Pannes</h1>
		<section class="cadre" id="cadre_pannes" style="height : <?php echo $taille_2_cadres; ?>px ; margin-top: <?php echo $margin_top_pannes; ?>px ;">
			<a href="../pannes_utilisateur/panne.php" class="bouton" id ="bouton_panne">Accéder aux pannes</a>
			<a href="../pannes_utilisateur/panne.php" class="bouton" id ="bouton_formulaire">Envoyer un formulaire à Domisep</a>
			<?php include("affichage_pannes.php");?>
    	</section>
    	<footer>
			<?php include("../Mise_en_page/footer.php");?>
		</footer>
	</body>

</html>