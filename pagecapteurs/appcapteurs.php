<?php
  session_start(); //ouverture de la session
  include ("C:\wamp64\www\HUSv4\HUSv4\connexionbdd.php");

  //execute les fonctionnalités programmées
  include('..\ActualisationEtatActionneur\ActuEtatAct.php');

  
  $pieces = $bdd -> query("SELECT * FROM pieces WHERE ID_Habitat='".$_SESSION['IDhabitat']."'"); // on récupère toutes les pièces de l'habitat
  $piecesh =  $pieces -> fetchall();

  foreach ($piecesh as $i => $reponse) {
      $query1 = $bdd -> query("SELECT * FROM equipements WHERE ID_Piece='".$reponse['ID']."'");
      $donnees1 =  $query1 -> fetchall();
  }


// pour connaitre la synthaxe pour afficher une variable
// $reponse2 = $bdd -> query("SELECT * FROM equipements");
// $donnees2 =  $reponse2 -> fetch();
// echo $donnees2['Nom'];

//Jointures de deux manières différentes:

//Methode récente
// SELECT j.nom nom_jeu, p.prenom prenom_proprietaire
// FROM proprietaires p
// INNER JOIN jeux_video j
// ON j.ID_proprietaire = p.ID

//Méthode ancienne
// SELECT jeux_video.nom, proprietaires.prenom
// FROM proprietaires, jeux_video
// WHERE jeux_video.ID_proprietaire = proprietaires.ID

// ajouter un équipement à la base de données
// traitement d'envoi du formulaire
if (isset($_POST) && !empty($_POST)){
  //valider les données
  if(isset($_POST['valider']) && isset($_POST['nom']) && isset($_POST['presence']) && isset($_POST['etat']) && isset($_POST['piece'])
  && isset($_POST['type']) && isset($_POST['categorie']) && isset($_POST['equipement_lié']) && isset($_POST['reference'])){
    //if (estUneChaine($_POST['nom']) && estUnEntier($_POST['etat'])){
    $idpiece = $bdd -> query('SELECT ID FROM pieces WHERE Nom="'.$_POST['piece'].'" AND ID_Habitat="'.$_SESSION['IDhabitat'].'"');
    $idp = $idpiece -> fetch(); // on récupère l'ID de la pièce entré dans le formulaire

    // echo $idp['ID'];
    $idtypeequipement = $bdd -> query('SELECT ID FROM type_equipement WHERE Nom="'.$_POST["type"].'"');
    $idtype = $idtypeequipement -> fetch(); // on récupère l'ID du type de l'équipement rentré

    // echo $idtype['ID'];
    $idcategorieequipement = $bdd -> query('SELECT ID FROM categorie_equipement WHERE Nom="'.$_POST["categorie"].'"');
    $idcategorie = $idcategorieequipement -> fetch();// récupère l'ID de la catégorie de l'équipement
    // echo $idcategorie['ID'];

    $idtypeequipement2 = $bdd -> query('SELECT ID FROM type_equipement WHERE Nom="cemac"');
    $idtype2 = $idtypeequipement2 -> fetch(); // on récupère l'ID du type de l'équipement cemac

    $idcemac = $bdd -> query ('SELECT ID FROM equipements WHERE ID_type_equipement="'.$idtype2['ID'].'" AND Nom="'.$_POST["equipement_lié"].'"'); // on vérifie qu'il sagit bien d'un Cemac et on récupère l'ID de l'équipement lié
    $idce = $idcemac -> fetch();
    // echo $idce['ID'];
    if ($_POST['presence']=="oui"){
      $presence=1;
    }
    else {
      $presence=0;
    }
    if (!empty($idce)){
    $query = $bdd -> prepare("INSERT INTO equipements(Nom,Reference,Etat,Date_installation,Presence_page_accueil,ID_Piece,ID_Equipement_lie,ID_type_equipement,ID_categorie_equipement)
    VALUES (:Nom,:Reference,:Etat,NOW(),:Presence_page_accueil,:ID_Piece,:ID_Equipement_lie,:ID_type_equipement,:ID_categorie_equipement)");
    $query -> execute(array(
      ':Nom' => $_POST['nom'],
      ':Reference' => $_POST['reference'],
      ':Etat' => $_POST['etat'],
      ':Presence_page_accueil'=>$presence,
      ':ID_Piece' => $idp['ID'],
      ':ID_Equipement_lie' => $idce['ID'],
      ':ID_type_equipement' => $idtype['ID'],
      ':ID_categorie_equipement' => $idcategorie['ID']));

    header('location:appcapteurs.php');
  }
  else {
    $query = $bdd -> prepare("INSERT INTO equipements(Nom,Reference,Etat,Date_installation,Presence_page_accueil,ID_Piece,ID_Equipement_lie,ID_type_equipement,ID_categorie_equipement)
    VALUES (:Nom,:Reference,:Etat,NOW(),:Presence_page_accueil,:ID_Piece,NULL,:ID_type_equipement,:ID_categorie_equipement)");
    $query -> execute(array(
      ':Nom' => $_POST['nom'],
      ':Reference' => $_POST['reference'],
      ':Etat' => $_POST['etat'],
      ':Presence_page_accueil'=>$presence,
      ':ID_Piece' => $idp['ID'],
      ':ID_type_equipement' => $idtype['ID'],
      ':ID_categorie_equipement' => $idcategorie['ID']));

    header('location:appcapteurs.php');
  }
//  }
}

    else {
      echo "formulaire invalide";
    }
}




// pour faire des listes déroulantes dépendantes de la BDD
  $listepiece = $bdd -> query("SELECT Nom FROM pieces WHERE ID_Habitat='".$_SESSION['IDhabitat']."'"); // à modifier avec des variables sessions
  $listep = $listepiece -> fetchall();

  $listetypeequipement = $bdd -> query("SELECT Nom FROM type_equipement");
  $listetype = $listetypeequipement -> fetchall();

  $listecategorieequipement = $bdd -> query("SELECT Nom FROM categorie_equipement");
  $listecategorie = $listecategorieequipement -> fetchall();

  $id_categorie = $bdd -> query ("SELECT ID FROM type_equipement WHERE Nom='cemac' ");
  $id_cemac = $id_categorie -> fetch();

  foreach ($piecesh as $i => $reponse) {
    $listecemac = $bdd -> query("SELECT * FROM equipements WHERE ID_Piece='".$reponse['ID']."' AND ID_type_equipement= '".$id_cemac['ID']."'");
    $listece =  $listecemac -> fetchall();
  }

?>
<!DOCTYPE html>
<html>
	<head>
		<title> HUS - Equipements </title>
		<meta charset="utf-8">
    <link rel="stylesheet" href ="appcapteurs1.css"/>
    <link rel="stylesheet" href="../Mise_en_page/header.css"/>
    <link rel="stylesheet" href="../Mise_en_page/footer.css"/>
	</head>

	<body>
	<header>
    	<?php include("../Mise_en_page/header.html");?>
    </header>
    <p> Liste des Equipements de l'habitat </p>
    <?php  if(!empty($donnees1)) { ?>
    <table>
     <thead>
       <tr>
         <th>Nom</th>
         <th>Références</th>
         <th>Etat</th>
         <th>Donnée du capteur </th>
         <th>Date d'installation</th>
         <th>Pièce</th>
         <th>Type equipement</th>
         <th>Type catégorie</th>
         <th>Présent sur la page accueil </th>
         <th>Equipement lié</th>
         <th>Suppression</th>
       </tr>
      </thead>
      <tbody>
        <?php foreach ($donnees1 as $i => $element1) {
          //Pour afficher dans le tableau
          //Jointure sql: récupérer les pieces des equipements
            $query2 = $bdd -> query(
              "SELECT `pieces`.`Nom`
              FROM `pieces`
              INNER JOIN `equipements`
              ON `pieces`.`ID` = '".$element1['ID_Piece']."'");
              $donnees2=$query2->fetch();

          //Pour afficher dans le tableau
          //Jointure sql: récupérer la catégorie de l'équipement
            $query3 = $bdd -> query(
              "SELECT `categorie_equipement`.`Nom`
              FROM `categorie_equipement`
              INNER JOIN `equipements`
              ON '".$element1['ID_categorie_equipement']."' = `categorie_equipement`.`ID`");
            $donnees3 = $query3->fetch();

          //Pour afficher dans le tableau
          //Jointure sql: récupérer le type de l'équipement
            $query4 = $bdd -> query(
              "SELECT `type_equipement`.`Nom`
              FROM `type_equipement`
              INNER JOIN `equipements`
              ON '".$element1['ID_type_equipement']."' = `type_equipement`.`ID`");
              $donnees4 = $query4->fetch();

            $query5 = $bdd -> query(
              "SELECT `equipements`.`Nom`
              FROM `equipements`
              WHERE ID='".$element1['ID_Equipement_lie']."'");
              $donnees5 = $query5->fetch();

            // Pour afficher dans le tableau
            // Jointure sql: récupérer les données des equipements
              $donneecapteurs = $bdd -> query(
                "SELECT Donnee
                FROM donnee
                WHERE (date < NOW()) AND (ID_Equipement = '".$element1['ID']."') ORDER BY date DESC LIMIT 1");
                $donneec = $donneecapteurs->fetch();
              ?>
            <tr>
               <td>
                 <?php echo'<a href="appcode.php">'.$element1['Nom'].'</a>' ; // lien renvoyant à la pièce dans laquelle se trouve l'équipement
                 ?>
                 </td>
              <td>
                <?php echo $element1['Reference'];?>
              </td>

               <td>
                 <?php
                 if ($element1['Etat']==0){

                   // echo $element1['ID'];
                   $id_changement1=$element1['ID'];
                   // echo $id_suppression;
                   echo '<a href="modification.php?id1='.$id_changement1.'">Eteint</a>'; // Renvoie vers supprimer.php?id=4 par exemple
                 }
                 else {
                   $id_changement2=$element1['ID'];
                   echo '<a href="modification.php?id2='.$id_changement2.'">Allumé</a>'; // Renvoie vers supprimer.php?id=4 par exemple
                 }
                 ?>
               </td>
               <td>
                 <?php
                 if (!empty($donneec['Donnee'])){
                 echo $donneec['Donnee'];
                 }
                 else {
                   echo "Pas de valeur";
                 }
                 ?>
               </td>
               <td>
                 <?php echo $element1['Date_installation']; ?>
               </td>
               <td>
                 <?php echo $donnees2['Nom']; // nom de la pièce ?>
               </td>
               <td>
                 <?php echo $donnees4['Nom']; // type de l'équipement ?>
               </td>
               <td>
                 <?php echo $donnees3['Nom']; // catégorie de l'équipement ?>
               </td>
               <td>
                 <?php
                 if ($element1['Presence_page_accueil']==0){
                     // echo $element1['ID'];
                     echo "NON";
                   }
                   else {
                     echo "OUI";
                   }
                 ?>
               </td>
               <td>
                 <?php echo $donnees5['Nom']; // nom de l'équipement lié ?>
               </td>
                   <?php
                   // echo $element1['ID'];
                   $id_suppression=$element1['ID'];
                   // echo $id_suppression;
                   echo '<td><a href="modification.php?id='.$id_suppression.'">Supprimer</a></td>'; // Renvoie vers supprimer.php?id=4 par exemple
                   ?>
             </tr>
           <?php } ?>
      </tbody>
      </table>
    <?php } ?>


    <p> Ajouter un Equipement </p>
    <form method="post" action="appcapteurs.php" class="formulaire">
      <label id="nomequipement">
        Nom de l'équipement:
        <input type="text" name="nom" placeholder="Ex:cemacsalon" class="bas" required>
      </label>   <br>
      <label id="refequipement">
        Référence de l'équipement:
        <input type="text" name="reference"  class="bas" required>
      </label>   <br>
      <label id="etat">
        Etat: (Eteint:0 et Allumé:1)
        <input type="number" name="etat" min=0 max=1 class="bas" required>
      </label>   <br>
      <!-- <label id="date">
        Date d'installation:
        <input type="datetime-local" name="date" class="bas">
      </label>   <br> -->
      <label id="type">
        Quel est le type de l'équipement ?
        <select name="type" class="bas">
          <option value=""> </option>
          <?php foreach($listetype as $d => $elementtype) {
          echo '<option value="' . $elementtype["Nom"] . '" >'. $elementtype["Nom"] . '</option>';
        } ?>
        </select>
      </label>   <br>
      <label id="presence">
        L'équipement sera-t-il présent sur la page d'acceuil ?
        <select name="presence" class="bas">
            <option value="non"> non </option>;
            <option value="oui"> oui </option>;
        </select>
      </label>   <br>
      <label id="piece">
        Dans quel pièce souhaitez-vous mettre l'équipement ?
        <select name="piece" class="bas">
          <option value=""> </option>
          <?php foreach($listep as $d => $elementp) {
          echo '<option value="' . $elementp["Nom"] . '">'. $elementp["Nom"] . '</option>';
        } ?>
        </select>
      </label>   <br>
      <label id="categorie">
        Quelle est la catégorie de l'équipement ?
        <select name="categorie" class="bas">
          <option value=""> </option>
          <?php foreach($listecategorie as $d => $elementcategorie) {
          echo '<option value="' . $elementcategorie["Nom"] . '">'. $elementcategorie["Nom"] . '</option>';
        } ?>
        </select>
      </label>   <br>
      <label id="equipement_lié">
        Si ce n'est pas une CeMAC, à quelle CeMAC souhaitez-vous lier cet équipement ?
        <select name="equipement_lié" class="bas">
          <option value=""> </option>
          <?php foreach($listece as $d => $elementcemac) {
          echo '<option value="' . $elementcemac["Nom"] . '">'. $elementcemac["Nom"] . '</option>';
        } ?>
        </select>
      </label>   <br>
        <input type="submit" name="valider" value ="Valider">
    </form>

		<footer>
			<?php include("../Mise_en_page/footer.php");?>
		</footer>
	   </body>
  </html>
