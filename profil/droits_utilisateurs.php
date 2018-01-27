
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<section id="ajout_droits">
<h1>Droits utilisateurs</h1>



<form method="post" action="set_droits.php>">
	<?php

	// connnexion à la base de données HUS
  include ("C:\wamp64\www\HUSv4\HUSv4\connexionbdd.php");
	$Droits = $bdd->query('SELECT * FROM droits');
	while ($Droits2 = $Droits->fetch())
	{
		//echo $Util2['Nom'];
		?><input type="checkbox" name=<?php echo $Droits2['Nom'];?> /> <label><?php echo $Droits2['Nom'];?></label><br /><?php
	}




	?>
	<input type="submit" value="Supprimer" name="supprimer">
	<input type="submit" value="Ajouter" name="ajouter">
</form>

</section>



<!--<section id="vue_droits">
	<?php
	/*
	$ID=1;
	$Util = $bdd->prepare('SELECT Nom,Prenom FROM utilisateurs WHERE ID_compte_parent = ?');
	$Util->execute(array($ID));
	while ($Util2=$Util->fetch()) {
		echo $Util2['Nom'];
		if ($_POST[$Util2['Nom']]=='True') { //on identifie qui est coché

			$id_enf = $bdd->prepare('SELECT ID FROM utilisateurs WHERE Nom=? AND Prenom=?');
			$id_enf->execute(array($Util2['Nom'],$Util2['Prenom']));

			//ON RECUPERE L'ID DU COMPTE ENFANT COCHE

			while ($id_enf=$id_enf->fetch()) {
				//ON RECUPERE LES DROITS DU COMPTE ENFANT COCHE

				$D = $bdd->prepare('SELECT Nom FROM droits JOIN lien_droits_utilisateurs ON ID.droits=ID_droits.lien_droits_utilisateurs WHERE ID_utilisateur=?');
				$D->execute(array($id_enf));


				while ($D2=$D->fetch()) {
					echo $D2;
				}
			}
			break;

		}


	}

*/
?>
</section>
!-->

</body>
</html>
