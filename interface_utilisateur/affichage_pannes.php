<?php 
	//affichage des pannes pour l'interface utilisateur
	foreach ($donnée_panne as $i => $reponse) {
		$mon_equipement = $reponse["Nom"];
		$id_piece_panne = $reponse["ID_Piece"];
		$piece_panne=$bdd->query('SELECT pieces.Nom FROM pieces WHERE pieces.ID="'.$id_piece_panne.'"');
		$donnée_panne_piece=$piece_panne->fetch() ;
		$ma_piece=$donnée_panne_piece["Nom"];
		echo '<div class="equipement_panne">'.$mon_equipement.' | pièce : '.$ma_piece.'</div>';
	}
?>