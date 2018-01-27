<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="">
	</head>

	<body>
	<div id="menucatalogue">
		<form method="post" action="catalogue.php">
		<select name="choix">
			<option value=""></option>
    		<option value="temperature">Température</option>
    		<option value="luminosite">Luminosité</option>
    		<option value="confort">Confort</option>
    		<option value="securite">Sécurité</option>
    		<option value="consommation">Consommation</option>
    		 <input type="submit" value="Valider" />
		</select>
		</form>

		<h1>Choisir capteur</h1>
		<form method="post" action="catalogue.php">
		nomducapteur:<input type="text" name="capteur">
		<input type="submit" name="envoi" value="envoi">
	</form>
		<?php
		//echo $_POST ["choix"]; verification de la variable choix


		{
			$bdd = new PDO('mysql:host=localhost;dbname=husv4;charset=utf8', 'root', ''); // Cherche la bdd
		}


			switch ($_POST['choix'])
				{
				    case '':
				        $reponse = $bdd->query('SELECT * FROM equipements_proposes_par_domisep');
				        while ($donnees = $reponse->fetch())
				        {
				            echo $donnees['Nom']. ' est un capteur de ' .$donnees['Type_equipement'].'<br/>'  ;
				        }
				        $reponse->closeCursor();
				        break;

				case 'temperature':
					$reponse = $bdd->query('SELECT * FROM equipements_proposes_par_domisep WHERE Type_equipement="'.
		          $_POST["choix"].'" ');
					while ($donnees = $reponse->fetch())
						{
						echo $donnees['Nom']. ' est un capteur de ' .$donnees['Type_equipement'].'<br/>'  ;
						}
					$reponse->closeCursor();
					break;


				case 'luminosite':
				    $reponse = $bdd->query('SELECT * FROM equipements_proposes_par_domisep WHERE Type_equipement="'.
					$_POST["choix"].'" ');
					  while ($donnees = $reponse->fetch())
					        {
					            echo $donnees['Nom']. ' est un capteur de ' .$donnees['Type_equipement'].'<br/>'  ;
					        }
					  $reponse->closeCursor();
					  break;


				case 'confort':
				    $reponse = $bdd->query('SELECT * FROM equipements_proposes_par_domisep WHERE Type_equipement="'.
								    $_POST["choix"].'" ');
				    while ($donnees = $reponse->fetch())
				    {
				        echo $donnees['Nom']. ' est un capteur de ' .$donnees['Type_equipement'].'<br/>'  ;
				    }
				    $reponse->closeCursor();
				    break;


				case 'securite':
				    $reponse = $bdd->query('SELECT * FROM equipements_proposes_par_domisep WHERE Type_equipement="'.
								    $_POST["choix"].'" ');
				    while ($donnees = $reponse->fetch())
				    {
				        echo $donnees['Nom']. ' est un capteur de ' .$donnees['Type_equipement'].'<br/>'  ;
				    }
				    $reponse->closeCursor();
				    break;

				case 'consommation':
				    $reponse = $bdd->query('SELECT * FROM equipements_proposes_par_domisep WHERE Type_equipement="'.
								    $_POST["choix"].'" ');
				    while ($donnees = $reponse->fetch())
				    {
				        echo $donnees['Nom']. ' est un capteur de ' .$donnees['Type_equipement'].'<br/>'  ;
				    }
				    $reponse->closeCursor();
				    break;

		        }

        ?>



       <?php
         $bdd = new PDO('mysql:host=localhost;dbname=husv2;charset=utf8', 'root', ''); // Cherche la bdd
         $phraseRecherchee = $_POST['capteur'];
         //on acc�de les donn�es que l'on veut
         $reponse = $bdd->query("SELECT * FROM equipements_proposes_par_domisep WHERE Nom LIKE '%$phraseRecherchee%' ");

         //on r�cup�re les donn�es ligne par ligne
         while($donnee = $reponse->fetch())
         {
             echo $donnees['Prix'];
         }

         $reponse->closeCursor(); // Termine le traitement de la requ�te

         ?>

        </div>
        <body>
