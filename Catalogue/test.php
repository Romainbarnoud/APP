<?php
$bdd = new PDO('mysql:host=localhost;dbname=husv4;charset=utf8', 'root', ''); // Cherche la bdd


$reponse = $bdd->query('SELECT Lien_image FROM equipements_proposes_par_domisep');
while($donnees = $reponse->fetch())
{

    echo "<img src="  .  $donnees['Lien_image']  . ">";

}





?>
 	 a
