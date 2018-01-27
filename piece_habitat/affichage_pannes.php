<?php
	//affichage des pannes pour les pièces
	foreach ($donnée_panne as $i => $reponse) {
	    $etat=$reponse["etat"];
	    $mon_equipement = $reponse["Nom"];
	    $id_piece_panne = $reponse["ID_Piece"];
	    $piece_panne=$bdd->query('SELECT Nom,ID_Habitat FROM pieces WHERE pieces.ID="'.$id_piece_panne.'"');
	    $donnée_panne_piece=$piece_panne->fetch() ;
	    $ma_piece=$donnée_panne_piece["Nom"];
	    $mon_habitat=$donnée_panne_piece["ID_Habitat"];
	    if ($mon_habitat==$_SESSION['IDhabitat'] AND $etat=='en attente'){
	        echo '<div class="equipement_panne">'.$mon_equipement.' | pièce : '.$ma_piece.'</div>';
	    }
	}
?>
