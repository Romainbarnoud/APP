<?php 
    //affichage des fonctions globales pour l'interface utilisateur
	foreach ($donnée_piece as $i => $reponse) {
    	$mavaleur = $reponse["ID"];
    	$fonction_globale=$bdd->query('SELECT Nom,ID,Etat 
                                        FROM equipements 
                                        WHERE equipements.Presence_page_accueil=1 
                                        AND ID_Piece="'.$mavaleur.'"');
    	$donnée_fonction_globale=$fonction_globale->fetchAll();
    	foreach ($donnée_fonction_globale as $i => $reponse2) {
		  $mavaleur2 = $reponse2["Nom"];
		  if ($reponse2['Etat']==0){
		      $id_changement1=$reponse2['ID'];
		      echo '<a href="modifications.php?id1='.$id_changement1.'" class="bouton" id="bouton_piece">'.$mavaleur2.' Eteint</a>'; // Renvoie vers supprimer.php?id=4 par exemple
		  }
		  else {
		      $id_changement2=$reponse2['ID'];
		      echo '<a href="modifications.php?id2='.$id_changement2.'" class="bouton_allume" id="bouton_piece") ;>'.$mavaleur2.' Allumé</a>'; // Renvoie vers supprimer.php?id=4 par exemple
		  }
    	}
	}
?>