<?php
  $bdd = new PDO('mysql:host=localhost;dbname=husv4;charset=utf8', 'root', '');
  $query1 = $bdd -> query("SELECT * FROM equipements"); // faire des jointures pour récupérer les bonnes infos
  $donnees1 =  $query1 -> fetchall();
// variable session avec l'ID et l'IDhabitat pour afficher les bonnes pièces et tout


// pour connaitre la synthaxe pour afficher une variable
// $reponse2 = $bdd -> query("SELECT * FROM equipements"); // faire des jointures pour récupérer les bonnes infos
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
  && isset($_POST['type']) && isset($_POST['categorie']) && isset($_POST['equipement_lié'])){

    $idpiece = $bdd -> query('SELECT ID FROM pieces WHERE Nom="'.$_POST['piece'].'"');
    $idp = $idpiece -> fetch();
    // echo $idp['ID'];
    $idtypeequipement = $bdd -> query('SELECT ID FROM type_equipement WHERE Nom="'.$_POST["type"].'"');
    $idtype = $idtypeequipement -> fetch();
    // echo $idtype['ID'];
    $idcategorieequipement = $bdd -> query('SELECT ID FROM categorie_equipement WHERE Nom="'.$_POST["categorie"].'"');
    $idcategorie = $idcategorieequipement -> fetch();
    // echo $idcategorie['ID'];
    $idcemac = $bdd -> query ('SELECT ID FROM equipements WHERE ID_type_equipement=6 AND Nom="'.$_POST["equipement_lié"].'"'); // à modifier avec une jointure SQL pour vérifier que 6 c'est bien le type CEMAC
    $idce = $idcemac -> fetch();
    // echo $idce['ID'];
    $query = $bdd -> prepare("INSERT INTO equipements(Nom,Etat,Date_installation,Presence_page_accueil,ID_Piece,ID_Equipement_lie,ID_type_equipement,ID_categorie_equipement) VALUES (:Nom,:Etat,NOW(),:Presence_page_accueil,:ID_Piece,:ID_Equipement_lie,:ID_type_equipement,:ID_categorie_equipement)");

    if ($_POST['presence']=="oui"){
      $presence=1;
    }
    else {
      $presence=0;
    }
    $query -> execute(array(
      ':Nom' => $_POST['nom'],
      ':Etat' => $_POST['etat'],
      ':Presence_page_accueil'=>$presence,
      ':ID_Piece' => $idp['ID'],
      ':ID_Equipement_lie' => $idce['ID'],
      ':ID_type_equipement' => $idtype['ID'],
      ':ID_categorie_equipement' => $idcategorie['ID']));

    header('location:appcapteurs.php');
  }
    else {
      echo "formulaire invalide";
    }
}




// pour faire des listes déroulantes dépendantes de la BDD
  $listepiece = $bdd -> query("SELECT Nom FROM pieces WHERE ID_Habitat=1"); // à modifier avec des variables sessions
  $listep = $listepiece -> fetchall();

  $listetypeequipement = $bdd -> query("SELECT Nom FROM type_equipement");
  $listetype = $listetypeequipement -> fetchall();

  $listecategorieequipement = $bdd -> query("SELECT Nom FROM categorie_equipement");
  $listecategorie = $listecategorieequipement -> fetchall();

  $listecemac = $bdd -> query ("SELECT Nom FROM equipements WHERE ID_type_equipement=6"); // à modifier avec une jointure SQL pour vérifier que 6 c'est bien le type CEMAC
  $listece = $listecemac -> fetchall();

?>
<!DOCTYPE html>
<html>
	<head>
		<title> HUS - Equipements </title>
		<meta charset="utf-8">
    <link rel="stylesheet" href ="appcapteurs.css"/>
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
         <th>Etat</th>
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

            // supprimer des lignes de capteurs:
            // Problème: il faut récupérer $i et c'est pas le cas pour l'instant
            // echo $i;
            // if (isset($_POST["'.$i.'"]) && !empty($_POST["'.$i.'"])){
            //   echo "bonjour";
            //   $delete = $bdd -> query('DELETE FROM equipements WHERE ID="'.$i.'"');
            // }
              ?>
            <tr>
               <td>
                 <?php echo'<a href="appcode.php">'.$element1['Nom'].'</a>' ; // lien renvoyant à la pièce dans laquelle se trouve l'équipement
                 ?>
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
    <form method="post" action="appcapteurs.php" id="formulaire">
      <label id="nomequipement">
        Nom de l'équipement:
        <input type="text" name="nom" placeholder="Ex:cemacsalon" class="bas">
      </label>   <br>
      <label id="etat">
        Etat:
        <input type="number" name="etat" min=0 max=1 class="bas">
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
            <option value="oui"> oui </option>;
            <option value="non"> non </option>;
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
        Si ce n'est pas un CeMAC, à quel CeMAC souhaitez-vous lié cet équipement ?
        <select name="equipement_lié" class="bas">
          <option value=""> </option>
          <?php foreach($listece as $d => $elementcemac) {
          echo '<option value="' . $elementcemac["Nom"] . '">'. $elementcemac["Nom"] . '</option>';
        } ?>
        </select>
      </label>   <br>
        <input type="submit" name="valider" value ="Valider">
    </form>

<?php
//Exemple pour teste avec un catégorie d'équipement
    // <p> Ajouter une catégorie d'équipement:
    // <form method="post" action="">
    //   <label>
    //     Nom de la catégorie de l'équipement
    //     <input type="text" name="nom" placeholder="Ex:lumière">
    //   </label>       <br>
    //   <input type="submit" name="valider" value="Valider">
    // </form>
?>
		<footer>
			<?php include("../Mise_en_page/footer.php");?>
		</footer>
	   </body>
  </html>
