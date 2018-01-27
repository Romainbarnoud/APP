
<form method="post" action="droits_utilisateurs.php>">

<?php

// connnexion à la base de données HUS
include ("C:\wamp64\www\HUSv4\HUSv4\connexionbdd.php");



/*session_start();
$ID=$_SESSION['ID_utilisateurs'];
*/

$ID=1;//selection du compte parent


$Util = $bdd->prepare('SELECT Nom,Prenom FROM utilisateurs WHERE ID_compte_parent = ?');
$Util->execute(array($ID));




while ($Util2 = $Util->fetch())//on affiche la liste des utilisateurs secondaires
{
		?><input type="radio" checked="checked" value='True' name=<?php echo $Util2['Nom']+$Util2['Prenom'];?> value="True"/><label><?php echo $Util2['Nom'];?></label><br /><?php

}






 ?>
 	<input type="submit" name="Envoyer">
 </form>
