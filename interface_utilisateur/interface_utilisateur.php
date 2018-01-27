<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8" />
        <title>HUS - Mon interface</title>
        <link rel="stylesheet" href="style.css"/>
        <link rel="stylesheet" href="../Mise_en_page/header.css"/>
        <link rel="stylesheet" href="../Mise_en_page/footer.css"/>

    </head>
    <body>
        <header>
        	<?php include("../Mise_en_page/header.html");?>
        </header>
    	<!-- adapter la taille du cadre en fonction du nombre de pièces -->
		<?php
    //execute les fonctionnalités programmées
    include('..\ActualisationEtatActionneur\ActuEtatAct.php');

    //récupere les variables
    include("variables.php");?>

		<!--Affichage des pièces-->
    	<section class="cadre" style="height : <?php echo $taille_cadre_pieces; ?>px ;">
    		<?php include("affichage_pieces.php");?>
    	</section>

        <!--Fonction globales-->
    	<section class="cadre" id="cadre_fonctions" style="height : <?php echo $taille_2_cadres; ?>px ;">

        <?php
        if (isset($_POST) && !empty($_POST)){
          if (isset ($_POST['temperature']) && !empty($_POST['temperature']) && isset($_POST['validertemp'])){
            // echo "Température souhaitée : '".$_POST['temperature']."'";
            echo '<a href="fonctionnalitesp.php?id6=">Température souhaitée :'.$_POST['temperature'].'</a>';

            $donneetemp = $bdd -> query('SELECT Donnee FROM donnee WHERE ID_Equipement=105 AND date < NOW() ORDER BY date DESC LIMIT 1');
            $donnee = $donneetemp -> fetch(); // On récupère la valeur de la température affichée par le capteur

            if ($_POST['temperature']>$donnee['Donnee']){

              $idcategorieequipement = $bdd -> query('SELECT ID FROM categorie_equipement WHERE Nom="chauffage"');
              $idcategorie = $idcategorieequipement -> fetch(); // on récupère l'ID de la catégorie équipement
              $udpate = $bdd -> query('UPDATE equipements SET Etat=1 WHERE ID_categorie_equipement="'.$idcategorie['ID'].'"');

              while($_POST['temperature']> $donnee['Donnee']){

                $query10 = $bdd -> prepare("INSERT INTO donnee(Date,Donnee,ID_Equipement)
                VALUES (NOW(),:Donnee,:ID_Equipement)");

                $query10 -> execute(array(
                ':Donnee' => $donnee['Donnee'] + 1,
                ':ID_Equipement' => 105));

                $query10 -> closeCursor(); // Termine le traitement de la requête
                $donneetemp -> closeCursor(); // Termine le traitement de la requête

                $donneetemp = $bdd -> query('SELECT Donnee FROM donnee WHERE ID_Equipement=105 AND date < NOW() ORDER BY date DESC LIMIT 1');
                $donnee = $donneetemp -> fetch(); // On récupère la nouvelle valeur de la température affichée par le capteur

                sleep(1); // arrête le programme pendant 5 secondes
            }
              header('location:interface_utilisateur.php'); // on éteint tous les équipements qui possèdent la catégorie lumière

            }
            else if ($_POST['temperature']<$donnee['Donnee']){

              $idcategorieequipement1 = $bdd -> query('SELECT ID FROM categorie_equipement WHERE Nom="climatisation"');
              $idcategorie1 = $idcategorieequipement1 -> fetch(); // on récupère l'ID de la catégorie équipement

              $udpate = $bdd -> query('UPDATE equipements SET Etat=1 WHERE ID_categorie_equipement="'.$idcategorie1['ID'].'"');

              while($_POST['temperature'] < $donnee['Donnee']){

                $query10 = $bdd -> prepare("INSERT INTO donnee(Date,Donnee,ID_Equipement)
                VALUES (NOW(),:Donnee,:ID_Equipement)");

                $query10 -> execute(array(
                ':Donnee' => $donnee['Donnee'] - 1,
                ':ID_Equipement' => 105));

                $query10 -> closeCursor();
                $donneetemp -> closeCursor(); // Termine le traitement de la requête

                $donneetemp = $bdd -> query('SELECT Donnee FROM donnee WHERE ID_Equipement=105 AND date < NOW() ORDER BY date DESC LIMIT 1');
                $donnee = $donneetemp -> fetch(); // On récupère la nouvelle valeur de la température affichée par le capteur

                sleep(5); // arrête le programme pendant 5 secondes
              }

              header('location:interface_utilisateur.php'); // on éteint tous les équipements qui possèdent la catégorie lumière

            }
          }
        }
        else {
        ?>
        <div class="bouton" id="bouton_fonction">
          <form method="post" action="interface_utilisateur.php">
          <label>Chauffage<input type="number" name="temperature" id="temperature"/></label>
          <input type="submit" name="validertemp" value ="Valider">
          </form>
        </div>
        <?php
        }
        ?>
    		<a href="fonctionnalitesp.php?id4=oui" class="bouton" id="bouton_fonction"> Extinction globale </a>
        <a href="fonctionnalitesp.php?id5=lumiere" class="bouton" id="bouton_fonction"> Extinction des lumières </a>
        <a href="fonctionnalitesp.php?id6=lumiere" class="bouton" id="bouton_fonction"> Allumage des lumières </a>
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
<?php
$donneetemp1 = $bdd -> query('SELECT Donnee,Date FROM donnee WHERE ID_Equipement=105 AND date < NOW() ORDER BY date DESC LIMIT 1');
$donnee1 = $donneetemp1 -> fetch(); // On récupère la valeur de la température affichée par le capteur
// il faut prendre la dernière valeur

//liste de tous les habitats
$query108 = $bdd -> query("SELECT * FROM habitat");
$donnees108 =  $query108 -> fetch();
?>
    		<div class="infos" id="premiere_info">Température globale : <?php echo $donnee1['Donnee'];?> à <?php echo$donnee1['Date'] ;?></div>
   			<div class="infos">Surface totale : <?php echo $donnees108['Surface'] ;?> m²</div>
   			<div class="infos">Consommation d'electricité</div>
   			<div class="infos">Consommation d'eau</div>


    	</section>
    	<footer>
			<?php include("../Mise_en_page/footer.php");?>
		</footer>
    </body>

</html>
