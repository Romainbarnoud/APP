<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="stylecata.css">
	</head>

	<body>
        <?php
        //echo $_POST ["choix"]; verification de la variable choix


        {
        	$bdd = new PDO('mysql:host=localhost;dbname=husv4;charset=utf8', 'root', ''); // Cherche la bdd
        }


        switch ($_POST['choix'])  // on indique sur quelle variable on travaille
        		{


        		case '3': // On differencie chaque cas que la variable peut prendre
        			$reponse = $bdd->query('SELECT * FROM equipements_proposes_par_domisep WHERE ID_categorie_equipement="'.
                  $_POST["choix"].'" ');
        			while ($donnees = $reponse->fetch()) //on r�cup�re les donn�es ligne par ligne
        				{
        				    echo '<p>'.$donnees["Nom"].'</p>'.$donnees["Caracteristiques"]; // �crire le nom et les caracteristiques des capteur
        				    echo "<img src="  .  $donnees['Lien_image']  . ">"."<br>";
        				    echo "<button class='button1'>Commander</button>";
        				}
        			$reponse->closeCursor();
        			break;


        		case '2': // on effectue la manipulation pour chaque possibilit�s
        		    $reponse = $bdd->query('SELECT * FROM equipements_proposes_par_domisep WHERE ID_categorie_equipement="'.
        			$_POST["choix"].'" ');
        			  while ($donnees = $reponse->fetch())
        			        {
        			            echo "<p>".$donnees['Nom']."</p>".$donnees['Caracteristiques'].'<br/>'  ;
        			            echo "<img src="  .  $donnees['Lien_image']  . ">";
        			            echo "<button class='button1'>Commander</button>";
        			        }
        			  $reponse->closeCursor();
        			  break;


        		case '4':
        		    $reponse = $bdd->query('SELECT * FROM equipements_proposes_par_domisep WHERE ID_categorie_equipement="'.
        						    $_POST["choix"].'" ');
        		    while ($donnees = $reponse->fetch())
        		    {
        		        echo "<p>".$donnees['Nom']."</p>".$donnees['Caracteristiques'].'<br/>'  ;
        		        echo "<img src="  .  $donnees['Lien_image']  . ">";
        		        echo "<button class='button1'>Commander</button>";
        		    }
        		    $reponse->closeCursor();
        		    break;


        		case '1':
        		    $reponse = $bdd->query('SELECT * FROM equipements_proposes_par_domisep WHERE ID_categorie_equipement="'.
        						    $_POST["choix"].'" ');
        		    while ($donnees = $reponse->fetch())
        		    {
        		        echo "<p>".$donnees['Nom']."</p>".$donnees['Caracteristiques'].'<br/>'  ;
        		        echo "<img src="  .  $donnees['Lien_image']  . ">";
        		        echo "<button class='button1'>Commander</button>";
        		    }
        		    $reponse->closeCursor();
        		    break;

        		case '7':
        		    $reponse = $bdd->query('SELECT * FROM equipements_proposes_par_domisep WHERE ID_categorie_equipement="'.
        						    $_POST["choix"].'" ');
        		    while ($donnees = $reponse->fetch())
        		    {
        		        echo $donnees['Nom']. ' est un capteur de ' .$donnees['Caracteristiques'].'<br/>'  ;
        		        echo "<img src="  .  $donnees['Lien_image']  . ">";
        		        echo "<button class='button1'>Commander</button>";
        		    }
        		    $reponse->closeCursor();
        		    break;

                }



        switch ($_POST['categorie'])  // on indique sur quelle variable on travaille
        {

                case '1': // On differencie chaque cas que la variable peut prendre
                $reponse = $bdd->query('SELECT * FROM equipements_proposes_par_domisep WHERE ID_type_equipement="'.
                        $_POST["categorie"].'" ');
                while ($donnees = $reponse->fetch()) //on r�cup�re les donn�es ligne par ligne
                {
                    echo '<p>'.$donnees["Nom"].'</p>'.$donnees["Caracteristiques"]; // �crire le nom et les caracteristiques des capteur
                    echo "<img src="  .  $donnees['Lien_image']  . ">";
                    echo "<button class='button1'>Commander</button>";
                }
                $reponse->closeCursor();
                break;
        }

        ?>
        </body>
