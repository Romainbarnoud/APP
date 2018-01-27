<?php

function RechercheElementBdd($table, $colonne, $filtre1, $filtre2)
{
	$bdd = new PDO('mysql:host=localhost;dbname=husv4;charset=utf8', 'root', '');
	$recherche = $bdd->prepare('SELECT '.$colonne.' FROM '.$table.' WHERE '.$filtre1.' = ?');
	$recherche->execute(array($filtre2));
	return $recherche;
}

?>
