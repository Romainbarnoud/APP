<?php


function RechercheElementBdd($table, $colonne, $filtre1, $filtre2)
{
	$bdd = new PDO('mysql:host=localhost;dbname=husv4;charset=utf8', 'root', '');
	$recherche = $bdd->prepare('SELECT '.$colonne.' FROM '.$table.' WHERE '.$filtre1.' = ?');
	$recherche->execute(array($filtre2));
	return $recherche;
}




function UpdateElementBdd($table, $colonne, $update, $filtre1, $filtre2)
{
	$bdd = new PDO('mysql:host=localhost;dbname=husv4;charset=utf8', 'root', '');
	return $bdd->query('UPDATE '.$table.' SET '.$colonne.' = '.$update.' WHERE '.$filtre1.' = "'.$filtre2.'"');
}





function Redirection($typeUti)
{
	switch ($typeUti) 
	{
		case 'primaire':

			header('Location:../../interface_utilisateur/interface_utilisateur.php');
			break;

		case 'secondaire':
		    header('Location:../../interface_utilisateur/interface_utilisateur.php');
			break;

		case 'technicien':
			header('Location:../../service_client/panne_service_client.php');
			break;

		case 'administrateur':
			header('Location:../../pageadmin/appadmin.php');
			break;
		
		default:
			echo "error";
			break;
	}
}


?>