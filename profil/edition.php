<head><link href="edition.css" media="all" rel="stylesheet" type="text/css" /></head>

<body>

<a href="profil.php">Retournez vers votre profil<br/></a>

<?php


// connnexion à la base de données HUS
include ("C:\wamp64\www\HUSv4\HUSv4\connexionbdd.php");


session_start();
$ID=$_SESSION['IDutilisateur'];
//$ID=25;

echo "Vos données ont bien été enregistrées.<br/>";


$mail = $bdd->prepare('UPDATE utilisateurs SET Adresse_mail=? WHERE ID = ?');
$mail->execute(array($_POST['adresse_mail'],$ID));



if ( $_POST['Nouveau_mot_de_passe']==null) {
} else {
	$mdp = $bdd->prepare('UPDATE utilisateurs SET mot_de_passe=? WHERE ID = ?');
	$mdp->execute(array($_POST['Nouveau_mot_de_passe'],$ID));
}


if ($_POST['fix']==null) {
} else {
	$fixe = $bdd->prepare('UPDATE utilisateurs SET Numero_fixe=? WHERE ID = ?');
	$fixe->execute(array($_POST['fix'],$ID));
}

if ($_POST['mobile']==null) {
} else {
	$mob = $bdd->prepare('UPDATE utilisateurs SET Numero_Telephone=? WHERE ID = ?');
	$mob->execute(array($_POST['mobile'],$ID));
}



?>

</body>
