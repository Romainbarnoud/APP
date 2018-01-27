<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="stylecata">
	</head>
	<body>
       <?php
         $bdd = new PDO('mysql:host=localhost;dbname=husv4;charset=utf8', 'root', ''); // Cherche la bdd
         $phraseRecherchee = $_POST['capteur'];
         //on acc�de aux donn�es que l'on veut
         $reponse = $bdd->query("SELECT * FROM equipements_proposes_par_domisep WHERE Nom LIKE '%$phraseRecherchee%' ");

         //on r�cup�re les donn�es ligne par ligne
         while($donnees = $reponse->fetch())
         {
             echo "<p>".$donnees['Nom']."</p>".$donnees['Caracteristiques'].'<br/>'  ;
             echo "<img src="  .  $donnees['Lien_image']  . ">";
             echo "<button class='button1'>Commander</button>";
         }

         $reponse->closeCursor(); // Termine le traitement de la requ�te
          ?>
     </body>
