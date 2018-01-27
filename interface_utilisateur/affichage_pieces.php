<?php
	//affichage des pièces pour l'interface utilisateur
	foreach ($donnée_piece as $i => $reponse) {
	    echo '<a href="../piece_habitat/piece.php?id='.$reponse['ID'].'" class="bouton" id="bouton_piece">'.$reponse["Nom"].'</a>';
	}
?>
