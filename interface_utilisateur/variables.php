<?php
	//variables pour l'interface utilisateur
		//include("../../Modele/requetes_sql.php");
		//valeurs

		// Connexion à la BDD hus
		$bdd = new PDO('mysql:host=localhost;dbname=husv4;charset=utf8', 'root', '');
        session_start();

        $donnée_habitat=$bdd->query('SELECT ID_Habitat
                                FROM lien_utilisateur_habitat
                                WHERE ID_Utilisateur="'.$_SESSION['IDutilisateur'].'"');
        $habitat=$donnée_habitat->fetch();
        $_SESSION['IDhabitat']=$habitat['ID_Habitat'];
		$nombre_pannes=0;
		$nombre_pieces=0;
		$nombre_fonctions=4;
		$nombre_infos=4;

		//régler la taille du cadre pour les pièces
		$piece=$bdd->query('SELECT Nom,ID
                            FROM pieces
                            WHERE ID_Habitat="'.$_SESSION['IDhabitat'].'"') ;
		$donnée_piece=$piece->fetchAll() ;
		foreach ($donnée_piece as $i => $reponse) {
		    $nombre_pieces=$nombre_pieces+1;
		    $id_piece=$reponse["ID"];
		    $fonction_globale=$bdd->query('SELECT *
                                          FROM equipements
                                          WHERE Presence_page_accueil=1
                                          AND ID_Piece="'.$id_piece.'"');
		   $donnée_fonction_globale=$fonction_globale->fetchAll();
		   foreach ($donnée_fonction_globale as $i => $reponse2) {
		        $nombre_fonctions=$nombre_fonctions+1;
		   }
		}
		if ($nombre_pieces%5 != 0){
		  $lignes_pieces=1+variant_int($nombre_pieces/5);
		}
		else{
		  $lignes_pieces=variant_int($nombre_pieces/5);
		}
		$taille_cadre_pieces=25+$lignes_pieces*140;

		//régler la taille du cadre pour les fonctions globales

		if ($nombre_fonctions%3 != 0){
		    $lignes_fonctions=1+variant_int($nombre_fonctions/3);
		}
		else{
		    $lignes_fonctions=variant_int($nombre_fonctions/3);
		}
		$taille_cadre_fonctions=25+$lignes_fonctions*140;

		//régler le taille du cadre pour les pannes

		$equipement_panne=$bdd->query('SELECT equipements.Nom,equipements.ID_Piece,pannes.etat
										FROM equipements,pannes
									    WHERE equipements.ID=pannes.ID_Equipement') ;
		$donnée_panne=$equipement_panne->fetchAll() ;
		foreach ($donnée_panne as $i => $reponse) {
				$id_piece_panne = $reponse["ID_Piece"];
				$piece_panne=$bdd->query('SELECT Nom,ID_Habitat FROM pieces WHERE pieces.ID="'.$id_piece_panne.'"');
				$donnée_panne_piece=$piece_panne->fetch() ;
				$mon_habitat=$donnée_panne_piece["ID_Habitat"];
				if ($mon_habitat==$_SESSION['IDhabitat']){
						$nombre_pannes=$nombre_pannes+1;
				}
		}
		$taille_cadre_pannes=150+($nombre_pannes)*40;

		//ajustement de la taille des 2 cadres en fonction du plus grand

		if($taille_cadre_pannes>$taille_cadre_fonctions){
		    $taille_2_cadres=$taille_cadre_pannes;
		}
		else{
		    $taille_2_cadres=$taille_cadre_fonctions;
		}

		//alignement des 2 cadres

		$margin_top_pannes=-$taille_2_cadres-8;

	    //régler la taille du cadre des infos de l'habitat
	    $taille_cadre_infos=70+($nombre_infos)*40;




			// //régler la taille du cadre pour les pièces
			// $pieces=$bdd->query('SELECT Nom,ID
	    //                         FROM pieces
	    //                         WHERE ID_Habitat="'.$_SESSION['IDhabitat'].'"') ;
			// $donnee_piece=$pieces->fetchAll() ;
			// foreach ($donnee_piece as $i => $reponse1) {
			// 		$nombre_fonctions=$nombre_fonctions+1
			// 		$id_piece=$reponse1["ID"];
			//     $fonction_globales=$bdd->query('SELECT Nom
	    //                                       FROM equipements
	    //                                       WHERE ID_Piece="'.$id_piece.'"');
			//    $donnee_fonction_globale=$fonction_globales->fetchAll();
			//    foreach ($donnee_fonction_globale as $i => $reponse2) {
			//         $nombre_fonctions=$nombre_fonctions+1;
			//    }
			// }

			?>
