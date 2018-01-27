<?php

// connnexion à la base de données HUS
include ("C:\wamp\www\HUSv4\HUSv4\connexionbdd.php");


function RechercheActUtilisateur($IDpiece)
{
    foreach ($IDpiece as $i => $reponse)
    {
        $var = $reponse["ID"];
        $NomAct = $bdd->query('SELECT Nom FROM equipements WHERE (ID_type_equipement = 3) AND (ID_Piece ="'.$var.'")');
        $NomAct = $NomAct->fetchall();
    }
    return $NomAct;
}



function DeroulantNomActionneurs($NomAct)
{
    foreach($NomAct as $d => $actionneur)
    {
        return echo '<option value="' . $actionneur["Nom"] . '" >'. $actionneur["Nom"] . '</option>';
    }
}


?>
