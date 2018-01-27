<?php

//pas echo, varaiable ok, ne pas maninipuler les $_session, creer fonction pour pas faire tout les else, session à créer quand le controle est positif et non au début, session destroy voir si il faut tout destroy ou pas, connection bdd à changer de place pas mettre dans la fonction
include("../../connexion/Modele/ModeleConnexion.php");




//creation de variables :


$emailF = $_POST['adresse_mailF'];
$mdpF = $_POST['mot_de_passeF'];

$rechercheID = RechercheElementBdd('utilisateurs', 'ID', 'Adresse_mail', ''.$emailF.'');
$rechercheID = $rechercheID->fetch();
$IDuti = $rechercheID['ID']; //variable contenant l'ID de l'utilisateur

//Recherche du type de l'utilisateur :
$rechercheIDType = RechercheElementBdd('lien_utilisateur_habitat', 'ID_type_utilisateur', 'ID_Utilisateur', ''.$IDuti.'');
$rechercheIDType = $rechercheIDType->fetch();
$IDType = $rechercheIDType['ID_type_utilisateur'];
$rechercheType = RechercheElementBdd('type_utilisateur', 'Nom', 'ID', ''.$IDType.'');
$rechercheType = $rechercheType->fetch();
$TypeUti = $rechercheType['Nom'];

$RechercheMDPutilisateur = RechercheElementBdd('utilisateurs', 'Mot_de_passe', 'Adresse_mail', ''.$emailF.'');
$RechercheMDPutilisateur = $RechercheMDPutilisateur->fetch();
$MDPuti = $RechercheMDPutilisateur['Mot_de_passe']; // mdp correspondant a� l'adresse mail rentr�e dans le formulaire

$RechercheEtat = RechercheElementBdd('utilisateurs', 'Etat_connexion', 'Adresse_mail', ''.$emailF.'');
$RechercheEtat = $RechercheEtat->fetch(); // etat (connect�/d�connect�) correspondant à l'adresse mail rentr�e dans le formuaire
$Etat = $RechercheEtat['Etat_connexion'];








//Verifications pour connexion :


/*if ($Etat == 0 OR $Etat == null) //On regarde si l'utilisateur est bien déconnecté.
{*/
	if (isset($emailF) AND isset($mdpF)) // On test si les champs sont bien remplis.
	{
		if ($MDPuti == null) // On test si l'adresse mail existe bien dans la bdd.
		{
		echo "Votre adresse email ou votre mot de passe est erroné. Redirection dans 3 secondes...";
		header('Refresh: 3; ../../connexion/Vue/VueConnexion.php');
		}

		else if ($mdpF == $MDPuti) //On compare le mdp dans la bdd et le mdp rentré.
		{
			$bdd = new PDO('mysql:host=localhost;dbname=husv4;charset=utf8', 'root', '');
			$bdd->query('UPDATE utilisateurs SET Etat_connexion = 1 WHERE Adresse_mail = "'.$emailF.'"'); // l'utilisateur est connecte dans la colonne etat
/*

			UpdateElementBdd('utilisateurs', 'Etat', 'connecte', 'Adresse_mail', ''.$emailF.'');*/
			session_start();
			$_SESSION['IDutilisateur'] = $IDuti;

			//liste de tous les types utilisateurs de l'utilisateur
			$query1 = $bdd -> query("SELECT ID_type_utilisateur FROM lien_utilisateur_habitat WHERE ID_Utilisateur=$IDuti");
			$id_type_utilisateur =  $query1 -> fetchall(); // besoin du fetchall pour le counter


			//liste des noms des id types utilisateurs


			// on compte combien de comptes l'utilisateur a
			$counter=0;
			foreach ($id_type_utilisateur as $i => $value) {
				$counter=$counter+1;
			}

			if ($counter > 1){
				?>
				<form method="post" action="../Modele/ModeleConnexion.php" class="formulaire">
				<label id="type_u">
			 		Lequels de ses comptes l'utilisateur souhaite utiliser ?
					<select name="type_utilisateur" class="bas">
						<?php foreach ($id_type_utilisateur as $d => $elementtype ) {
						$query2 = $bdd -> query("SELECT `type_utilisateur`.`Nom`
							FROM type_utilisateur
							INNER JOIN lien_utilisateur_habitat
							ON `type_utilisateur`.`ID`='".$elementtype['ID_type_utilisateur']."'");
						$nom_type_utilisateur =  $query2 -> fetch();

						echo '<option value="' . $nom_type_utilisateur["Nom"] . '" >'. $nom_type_utilisateur["Nom"] . '</option>';
					} ?>
					</select>
				</label>   <br>
				<input type="submit" name="valider" value ="Valider">
				</form>
				<?php
			}
			else {
				Redirection($TypeUti);
			}
		}

		else // Cas où le mdp ne correspond pas à l'adresse email rentrée.
		{
			echo "Votre adresse email ou votre mot de passe est erroné. Redirection dans 3 secondes...";
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
