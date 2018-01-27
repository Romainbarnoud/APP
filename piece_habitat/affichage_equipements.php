<?php 
    //affichage des equipements pour les pièces
	foreach ($donnée_equipement as $i => $reponse) {
        $mavaleur = $reponse["Nom"];
        if ($reponse['Etat']==0){
        	$id_changement1=$reponse['ID'];
        	echo '<a href="modifications.php?id1='.$id_changement1.'&amp;idp='.$_GET['id'].'" class="bouton" id="bouton_piece">'.$mavaleur.' Eteint</a>'; // Renvoie vers supprimer.php?id=4 par exemple
        }
        else {
    		$id_changement2=$reponse['ID'];
    		echo '<a href="modifications.php?id2='.$id_changement2.'&amp;idp='.$_GET['id'].'" class="bouton_allume" id="bouton_piece") ;>'.$mavaleur.' Allumé</a>'; // Renvoie vers supprimer.php?id=4 par exemple
    	}
	}
?>