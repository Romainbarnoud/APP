<?php
/*
 * @Quentin Chupin
 * Date:
 * Modele: fonctions de traitement de la bdd
 */

/*
 * Récupère tous les éléments d'une table. Paramètres:
 * @$champ -> nom du.es champ.s de la table désirée
 * @$table -> nom de la table désirée
 */
function recupererDesElements($champ, $table)
{
    include 'connect_to_bdd.php';
    
    $base = $bdd->query('SELECT '.$champ.' FROM '.$table.'');
    return $data = $base->fetchAll();
}

/*
 * Récupère des éléments spécifiques d'une table. Paramètres:
 * @$champ -> nom du.es champ.s de la table désirée
 * @$table -> nom de la table désirée
 * @$filtre -> indique le nom du champ par lequel le filtre s'opère
 * @$contenufiltre -> la valeur par laquelle on souhaite filtrer
 */
function selectionnerDesElementsParticuliers($champ, $table, $filtre, $contenufiltre)
{
    include 'connect_to_bdd.php';
    
    $base = $bdd->query('SELECT '.$champ.' FROM '.$table.' WHERE '.$filtre.' = '.$contenufiltre.'');
    return $data = $base->fetchAll();
}

/*
 * Récupère tous les éléments d'une table. Paramètres:
 * @ $table -> nom de la table désirée
 * @ $champ -> le nom du champ que l'on veut récupérer
 */
function mettreDesElementsEnTableau($champ,$table)
{
    include 'connect_to_bdd.php';
    
    $base = $bdd->query('SELECT '.$champ.' FROM '.$table.'');
    while ($data = $base->fetch())
    {
        $donnees[] = $data[''.$champ.''];
    }
    return $donnees;
}

/*
 * Récupère tous les éléments d'une table. Paramètres:
 * @ $table -> nom de la table désirée
 * @ $listechamps -> le nom des champs auxquels on veut ajouter des éléments
 * @ $listevalues -> le nom donné aux valeurs
 * /!\ Les champs et values doivent porter le même nom, auquel cas
 * @ $listeassociation -> array associatif
 */
function insererDesElements($table, $listechamps, $listevalues, $arrayassociations)
{
    include'connect_to_bdd.php';
    
    $base = $bdd->prepare('INSERT INTO '.$table.'('.$listechamps.') VALUES('.$listevalues.')');
    $base->execute($arrayassociations);
    
}
?>