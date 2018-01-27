<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="stylecata.css">
	</head>

	<body>
        <?php
        {
            $bdd = new PDO('mysql:host=localhost;dbname=husv4;charset=utf8', 'root', ''); // Cherche la bdd
        }
                switch ($_POST['type'])  // on indique sur quelle variable on travaille
                {

                    case '1': // On differencie chaque cas que la variable peut prendre
                        $reponse = $bdd->query('SELECT * FROM equipements_proposes_par_domisep WHERE ID_type_equipement="'.
                            $_POST["type"].'" ');
                        while ($donnees = $reponse->fetch()) //on r�cup�re les donn�es ligne par ligne
                        {
                            echo '<p>'.$donnees["Nom"].'</p>'.$donnees["Caracteristiques"]; // �crire le nom et les caracteristiques des capteur
                            echo "<img src="  .  $donnees['Lien_image']  . ">";
                            echo "<button class='button1'>Commander</button>";
                        }
                        $reponse->closeCursor();
                        break;


                    case '2': // On differencie chaque cas que la variable peut prendre
                        $reponse = $bdd->query('SELECT * FROM equipements_proposes_par_domisep WHERE ID_type_equipement="'.
                            $_POST["type"].'" ');
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
