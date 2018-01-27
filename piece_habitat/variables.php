<?php
	//variables pour les pièces

		//valeurs
        session_start();
		$nombre_pannes=0;
		$nombre_equipement=0;
		$nombre_infos=2;
		$bdd=new PDO('mysql:host=localhost;dbname=husv4;charset=utf8','root','') ;

		//régler la taille du cadre pour les equipements
		$id_piece=$_GET['id'];
		$donnée_piece=$bdd->query('SELECT Nom
                                FROM pieces
                                WHERE ID="'.$_GET['id'].'"');
        $piece=$donnée_piece->fetch();
		$equipement=$bdd->query('SELECT Nom,ID,Etat
                            FROM equipements
                            WHERE ID_Piece="'.$id_piece.'"') ;
	    $donnée_equipement=$equipement->fetchAll() ;
		foreach ($donnée_equipement as $i => $reponse) {
		    $nombre_equipement=$nombre_equipement+1;
		}
		if ($nombre_equipement%5 != 0){
		  $lignes_equipement=1+variant_int($nombre_equipement/5);
		}
		else{
		  $lignes_equipement=variant_int($nombre_equipement/5);
		}
		$taille_cadre_equipement=25+$lignes_equipement*140;

		//régler la taille du cadre pour les infos
		$taille_cadre_infos=70+($nombre_infos)*40;
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

		if($taille_cadre_pannes>$taille_cadre_infos){
		    $taille_2_cadres=$taille_cadre_pannes;
		}
		else{
		    $taille_2_cadres=$taille_cadre_infos;
		}
		//alignement des 2 cadres

		$margin_top_pannes=-$taille_2_cadres-8;

	    ?>
	    
