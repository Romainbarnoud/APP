<?php

//pas echo, varaiable ok, ne pas maninipuler les $_session, creer fonction pour pas faire tout les else, session à créer quand le controle est positif et non au début, session destroy voir si il faut tout destroy ou pas, connection bdd à changer de place pas mettre dans la fonction
include("../../connexion/Modele/ModeleConnexion.php");




//creation de variables :


$emailF = $_POST['adresse_mailF'];
$mdpF = $_POST['mot_de_passeF'];

$rechercheID = RechercheElementBdd('utilisateurs', 'ID', 'Adresse_mail', ''.$emailF.'');
$rechercheID = $rechercheID->fetch();
$IDuti = $rechercheID['ID']; //variable contenant l'ID de l'utilisateur

$rechercheType = RechercheElementBdd('type_utilisateur', 'Nom', 'ID_Utilisateur', ''.$IDuti.'');
$rechercheType = $rechercheType->fetch();
$TypeUti = $rechercheType['Nom'];

$RechercheMDPutilisateur = RechercheElementBdd('utilisateurs', 'Mot_de_passe', 'Adresse_mail', ''.$emailF.'');
$RechercheMDPutilisateur = $RechercheMDPutilisateur->fetch(); // mdp correspondant à l'adresse mail rentrée dans le formulaire
$MDPuti = $RechercheMDPutilisateur['Mot_de_passe'];

$RechercheEtat = RechercheElementBdd('utilisateurs', 'Etat_connexion', 'Adresse_mail', ''.$emailF.'');
$RechercheEtat = $RechercheEtat->fetch(); // etat (connecté/déconnecté) correspondant à l'adresse mail rentréé dans le formuaire
$Etat = $RechercheEtat['Etat_connexion'];








//Verifications pour connexion :


/*if ($Etat == 0 OR $Etat == null) //On regarde si l'utilisateur est bien déconnecté.
{*/
	if (isset($emailF) AND isset($mdpF)) // On test si les champs sont bien remplis.
	{
		if ($MDPuti == null) // On test si l'adresse mail existe bien dans la bdd.
		{
		echo "Votre adresse email est erronée. Redirection dans 3 secondes...";
		header('Refresh: 3; ../../connexionVue/VueConnexion.php');
		}

		else if ($mdpF == $MDPuti) //On compare le mdp dans la bdd et le mdp rentré.
		{
			
			$bdd = new PDO('mysql:host=localhost;dbname=husv4;charset=utf8', 'root', '');
			$bdd->query('UPDATE utilisateurs SET Etat_connexion = 1 WHERE Adresse_mail = "'.$emailF.'"'); // l'utilisateur est connecte dans la colonne etat
/*

			UpdateElementBdd('utilisateurs', 'Etat', 'connecte', 'Adresse_mail', ''.$emailF.'');*/
			session_start();
			$_SESSION['IDutilisateur'] = $IDuti;
			Redirection($TypeUti);
		}

		else // Cas où le mdp ne correspond pas à l'adresse email rentrée.
		{
			echo "Votre mot de passe est erroné. Redirection dans 3 secondes...";
			header('Refresh: 3; ../../connexion/Vue/VueConnexion.php');
		}

	}

	else // Cas où les champs ne sont pas remplis.
	{
	echo "Vous n'avez pas rempli un des champs";
	header('Refresh: 3; ../../connexion/Vue/VueConnexion.php');
	}
/*}

else if ($mdpF == $MDPuti) //cas où l'utilisateur est déjà connecté
{
	echo "Vous êtes déjà connecté. Redirection en cours...";
	header('Refresh: 3; ../../deconnexion/Controleur/ProcessDeconnexion.php');	
}

else // Cas où l'utilisateur est déjà connecté mais le  mdp ne correspond pas à l'adresse email rentrée.
{
	echo "Votre mot de passe est erroné. Redirection dans 3 secondes...";
	header('Refresh: 3; ../../connexion/Vue/VueConnexion.php');
}*/



?>
