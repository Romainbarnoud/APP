<?php


// connnexion à la base de données HUS
include ("C:\wamp64\www\HUSv4\HUSv4\connexionbdd.php");


session_start();
$ID=$_SESSION['IDutilisateur'];


//$ID=28;

echo "<strong>Nom</strong><br/>" ;
$Nom = $bdd->prepare('SELECT Nom FROM utilisateurs WHERE ID = ?');
$Nom->execute(array($ID));
while ($Nom2 = $Nom->fetch())
{
	echo $Nom2['Nom'] . '<br />';
}



echo "<strong>Prénom</strong><br/>";
$prenom = $bdd->prepare('SELECT Prenom FROM utilisateurs WHERE ID = ?');
$prenom->execute(array($ID));
while ($Prenom = $prenom->fetch())
{
	echo $Prenom['Prenom'] . '<br />';
}

echo "<strong>email</strong><br/>";
$mail = $bdd->prepare('SELECT Adresse_mail FROM utilisateurs WHERE ID = ?');
$mail->execute(array($ID));
while ($email = $mail->fetch())
{
	echo $email['Adresse_mail'] . '<br />';
}


echo "<strong>Numéro de téléphone mobile</strong><br/>";
$Num = $bdd->prepare('SELECT Numero_Telephone FROM utilisateurs WHERE ID = ?');
$Num->execute(array($ID));
while ($Num2 = $Num->fetch())
{
	echo $Num2['Numero_Telephone'] . '<br />';
}


echo "<strong>Numéro de téléphone fixe</strong><br/>";
$Num = $bdd->prepare('SELECT Numero_fixe FROM utilisateurs WHERE ID = ?');
$Num->execute(array($ID));
while ($Num2 = $Num->fetch())
{
	echo $Num2['Numero_fixe'] . '<br />';
}


?>
