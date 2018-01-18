<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8" />
        <title>HUS - Mon interface TEST</title>
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
		
		<!--Affichage des pièces-->
    	<section class="cadre" style="height : <?php echo $taille_cadre_pieces; ?>px ;">
    		<?php include("affichage_pieces.php");?>			
    	</section>

        <!--Fonction globales--> 
    	<section class="cadre" id="cadre_fonctions" style="height : <?php echo $taille_2_cadres; ?>px ;"> 
   		
    		<label class="bouton" id="bouton_fonction">Chauffage<input type="number" id="temperature"/></label>
    		<a href="interface_utilisateur.php" class="bouton" id="bouton_fonction">Extinction globale</a>
			<?php include("affichage_fonctions_globales.php");?>
			
    	</section>
    	    	
    	<!-- Pannes -->
    	<h1 class="cadre" id="cadre_pannes" style="margin-top: <?php echo $margin_top_pannes; ?>px ;">Pannes</h1>
		<section class="cadre" id="cadre_pannes" style="height : <?php echo $taille_2_cadres; ?>px ; margin-top: <?php echo $margin_top_pannes; ?>px ;">
			<a href="../pannes_utilisateur/panne.php" class="bouton" id ="bouton_panne">Accéder aux pannes</a>
			<a href="../pannes_utilisateur/panne.php" class="bouton" id ="bouton_formulaire">Envoyer un formulaire à Domisep</a>
			<?php include("affichage_pannes.php");?>
    	</section>
    	
    	<!--Infos habitat-->
    	<h1 class="cadre" id="cadre_infos_habitat">Informations de l'habitat</h1>
    	<section class="cadre" style="height: <?php echo $taille_cadre_infos;?>px;">
    	
    		<div class="infos" id="premiere_info">Température globale : 20°C</div>
   			<div class="infos">Surface totale : 120 m²</div>
   			<div class="infos">Consommation d'electricité</div>
   			<div class="infos">Consommation d'eau</div>
   			
    	</section>
    	<footer>
			<?php include("../Mise_en_page/footer.php");?>
		</footer>
    </body>

</html>
