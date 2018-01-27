<?php
  // connnexion à la base de données HUSv4
  include ("C:\wamp64\www\HUSv4\HUSv4\connexionbdd.php");

  //liste de tous les utilisateurs
  $query1 = $bdd -> query("SELECT * FROM utilisateurs"); // faire des jointures pour récupérer les bonnes infos
  $donnees1 =  $query1 -> fetchall();

  //liste de tous les habitats
  $query108 = $bdd -> query("SELECT * FROM habitat");
  $donnees108 =  $query108 -> fetchall();

  //liste de toutes les villes
  $query1008 = $bdd -> query("SELECT * FROM ville");
  $donnees1008 =  $query1008 -> fetchall();

  //liste de tous les pays
  $query10008 = $bdd -> query("SELECT * FROM pays");
  $donnees10008 =  $query10008 -> fetchall();

  //liste de tous les types équipement
  $query1009 = $bdd -> query("SELECT * FROM type_equipement");
  $donnees1009 =  $query1009 -> fetchall();

  //liste de toutes les catégories équipement
  $query1019 = $bdd -> query("SELECT * FROM categorie_equipement");
  $donnees1019 =  $query1019 -> fetchall();

// traitement d'envoi du formulaire
if (isset($_POST) && !empty($_POST)){
  //valider les données

    // Ajout d'un utilisateur dans la BDD
  if(isset($_POST['valideru']) && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['etat']) && isset($_POST['adresse_mail'])
  && isset($_POST['numero_fixe']) && isset($_POST['numero_telephone']) && isset($_POST['type_utilisateur']) && isset($_POST['compte_parent'])){

    $idcompte_parent = $bdd -> query('SELECT ID FROM utilisateurs WHERE Nom="'.$_POST['compte_parent'].'"'); // récupère l'ID du compte parent
    $idparent = $idcompte_parent -> fetch();
    // echo $idparent['ID'];

    // faire une requete pour insérer une ligne à utilisateur
    $query = $bdd -> prepare("INSERT INTO utilisateurs(Nom,Prenom,Adresse_mail,Mot_de_passe,Numero_fixe,Numero_Telephone,Etat_connexion,Date_inscription,ID_compte_parent)
    VALUES (:Nom,:Prenom,:Adresse_mail,:Mot_de_passe,:Numero_fixe,:Numero_Telephone,:Etat_connexion, NOW(),:ID_compte_parent)");

    // on vérifie que le compte parent est soit primaire ou secondaire car les autres types ne peuvent pas avoir de compte secondaires

    // $idtype_utilisateur = $bdd -> query('SELECT ID_type_utilisateur FROM lien_utilisateur_habitat WHERE ID_Utilisateur="'.$idparent['ID'].'"'); // récupère l'ID du type utilisateur
    // $idtype = $idtype_utilisateur -> fetch();
    //
    // $type_utilisateur = $bdd -> query('SELECT ID FROM type_utilisateur WHERE Nom=primaire OR Nom=secondaire'); // récupère l'ID de types utilisateurs autorisés
    // $type = $type_utilisateur -> fetchall();

    // foreach ($type as $i => $element878) {
    //     if ($element878['ID']==$idtype['ID_type_utilisateur']){
    //       //Execute la requête
    //       $query -> execute(array(
    //         ':Nom' => $_POST['nom'],
    //         ':Prenom' => $_POST['prenom'],
    //         ':Adresse_mail' => $_POST['adresse_mail'],
    //         ':Mot_de_passe' => $_POST['mot_de_passe'],
    //         ':Numero_fixe' => $_POST['numero_fixe'],
    //         ':Numero_Telephone' => $_POST['numero_telephone'],
    //         ':Etat_connexion' => $_POST['etat'],
    //         ':ID_compte_parent' => $idparent['ID'] ));
    //     }
    // }

    //Execute la requête
    $query -> execute(array(
      ':Nom' => $_POST['nom'],
      ':Prenom' => $_POST['prenom'],
      ':Adresse_mail' => $_POST['adresse_mail'],
      ':Mot_de_passe' => $_POST['mot_de_passe'],
      ':Numero_fixe' => $_POST['numero_fixe'],
      ':Numero_Telephone' => $_POST['numero_telephone'],
      ':Etat_connexion' => $_POST['etat'],
      ':ID_compte_parent' => $idparent['ID'] ));

      // faire une requete pour insérer une ligne à type_utilisateur
      if (isset($_POST['habitat']) && isset($_POST['type_utilisateur']))
        {
            $query9 = $bdd -> prepare("INSERT INTO lien_utilisateur_habitat(ID_type_utilisateur,ID_Habitat,ID_Utilisateur)
            VALUES (:ID_type_utilisateur,:ID_Habitat,:ID_Utilisateur)");
            // On récupère l'ID_Utilisateur
            $id_utilisateur = $bdd -> query('SELECT ID FROM utilisateurs WHERE Nom="'.$_POST['nom'].'" AND Prenom="'.$_POST['prenom'].'"');
            $id_u = $id_utilisateur -> fetch();

            //On récupère l'ID_type_utilisateur
            $id_type_utilisateur = $bdd -> query('SELECT ID FROM type_utilisateur WHERE Nom="'.$_POST['type_utilisateur'].'"');
            $id_t = $id_type_utilisateur -> fetch();

            $query9 -> execute(array(
            ':ID_type_utilisateur' => $id_t['ID'],
            ':ID_Habitat' => $_POST['habitat'],
            ':ID_Utilisateur' => $id_u['ID']));

            //envoi de mail
            include ("C:\wamp64\www\HUSv4\HUSv4\pageadmin\EnvoiDeMail.php");
            $mail = $_POST['adresse_mail'];
            envoiMail($mail);

            header('location:appadmin.php');
        }
        else {
          echo"formulaire invalide";
        }
      }

  // ajout d'un habitat à modifier
  else if (isset($_POST['postal']) && isset($_POST['rue']) && isset($_POST['numero_rue']) && isset($_POST['ville'])&& isset($_POST['surface'])
      && isset($_POST['etage']) && isset($_POST['numero_appartement']) && isset($_POST['validerh']))
  {

      // On récupère l'ID_ville
      $id_ville2 = $bdd -> query('SELECT ID FROM ville WHERE nom="'.$_POST['ville'].'"');
      $id_v2 = $id_ville2 -> fetch();

      // On récupère l'ID_pays
      $id_pays2 = $bdd -> query('SELECT ID FROM pays WHERE Nom="'.$_POST['pays'].'"');
      $id_p2 = $id_pays2 -> fetch();

      if (!empty($_POST['etage']) && !empty($_POST['numero_appartement'])){
        $query13 = $bdd -> prepare("INSERT INTO habitat(Code_postal,Rue,Numero_de_la_rue,Etage,Numero_de_appartement,Surface,ID_Pays,ID_Ville)
        VALUES (:Code_postal,:Rue,:Numero_de_la_rue,:Etage,:Numero_de_appartement,:Surface,:ID_Pays,:ID_Ville)");

        $query13 -> execute(array(
        ':Code_postal' => $_POST['postal'],
        ':Rue' => $_POST['rue'],
        ':Numero_de_la_rue' => $_POST['numero_rue'],
        ':Etage' => $_POST['etage'],
        ':Numero_de_appartement' => $_POST['numero_appartement'],
        ':Surface' => $_POST['surface'],
        ':ID_Pays' => $id_p2['ID'],
        ':ID_Ville' => $id_v2['ID']));

        header('location:appadmin.php');
      }
      else {
        $query13 = $bdd -> prepare("INSERT INTO habitat(Code_postal,Rue,Numero_de_la_rue,Etage,Numero_de_appartement,Surface,ID_Pays,ID_Ville)
        VALUES (:Code_postal,:Rue,:Numero_de_la_rue,NULL,NULL,:Surface,:ID_Pays,:ID_Ville)");

        $query13 -> execute(array(
        ':Code_postal' => $_POST['postal'],
        ':Rue' => $_POST['rue'],
        ':Numero_de_la_rue' => $_POST['numero_rue'],
        ':Surface' => $_POST['surface'],
        ':ID_Pays' => $id_p2['ID'],
        ':ID_Ville' => $id_v2['ID']));

        header('location:appadmin.php');
      }
  }
  // Ajout d'un type de catégorie équipement
  else if (isset($_POST['validerc']) && isset($_POST['c_categorie_equipement'])){
    $query10 = $bdd -> prepare("INSERT INTO categorie_equipement(Nom)
    VALUES (:Nom)");

    $query10 -> execute(array(
    ':Nom' => $_POST['c_categorie_equipement']));
    header('location:appadmin.php');
}
  // Ajout d'un type équipement
  else if (isset($_POST['validert']) && isset($_POST['e_type_equipement'])){
    $query11 = $bdd -> prepare("INSERT INTO type_equipement(Nom)
    VALUES (:Nom)");

    $query11 -> execute(array(
    ':Nom' => $_POST['e_type_equipement']));

    header('location:appadmin.php');
  }
  // Ajout d'une ville
  else if (isset($_POST['validerv']) && isset($_POST['v_ville'])){
    $query12 = $bdd -> prepare("INSERT INTO ville(Nom)
    VALUES (:Nom)");

    $query12 -> execute(array(
    ':Nom' => $_POST['v_ville']));

    header('location:appadmin.php');
  }
  else if (isset($_POST['validerp']) && isset($_POST['p_pays'])){
    $query12 = $bdd -> prepare("INSERT INTO pays(Nom)
    VALUES (:Nom)");

    $query12 -> execute(array(
    ':Nom' => $_POST['p_pays']));

    header('location:appadmin.php');
  }
  //faire des cas, si on remplit tout d'un coup !
    else {
      echo "formulaire invalide";
    }
}



//pour faire des listes déroulantes dépendantes de la BDD pour les différents formulaires
  // Plusieurs requêtes pour récupérer les utilisateurs primaires et secondaires
  $listeutilisateurs = $bdd -> query("SELECT ID,Nom, Prenom FROM utilisateurs");
  $listeu = $listeutilisateurs -> fetchall();

  $listetypeutilisateur = $bdd -> query("SELECT Nom FROM type_utilisateur");
  $listetype = $listetypeutilisateur -> fetchall();

  $listehabitat = $bdd -> query("SELECT * FROM habitat");
  $listeh = $listehabitat -> fetchall();

  $listeville = $bdd -> query("SELECT nom FROM ville");
  $listev = $listeville -> fetchall();

  $listepays = $bdd -> query("SELECT Nom FROM pays");
  $listep = $listepays -> fetchall();
?>
<!DOCTYPE html>
<html>
	<head>
		<title> HUS - Admin </title>
		<meta charset="utf-8">
    <link rel="stylesheet" href ="appadmin.css"/>
    <link rel="stylesheet" href="../Mise_en_page/header.css"/>
	</head>

	<body>
	<header>
    	<div id="entete">
            <div class="logo">
                <a href="lien"><img src="../Mise_en_page/Logo.png"></a>
            </div>
            <div class="nom">
                <a href="lien">H   U   S</a>
            </div>
            <div class="BoutonDeconnexion">
                <a href="../deconnexion/Controleur/ProcessDeconnexion.php" class="TextDeconnexion">Déconnexion</a>
            </div>
    	</div>
    </header>
    <p> Liste de tous les utilisateurs </p>
    <?php  if(!empty($donnees1)) { ?>
    <table>
     <thead>
       <tr>
         <th>Nom</th>
         <th>Prénom</th>
         <th>Etat de connexion </th>
         <th>Adresse mail</th>
         <th>Numéro fixe</th>
         <th>Numéro de téléphone</th>
         <th>Date inscription</th>
         <th>Type d'utilisateur</th>
         <th>Compte-parent</th>
         <th>Habitat</th>
         <th>Supprimer </th>
       </tr>
      </thead>
      <tbody>
        <?php foreach ($donnees1 as $i => $element1) {
          //Pour afficher dans le tableau
          //Jointure sql: récupérer les types des utilisateurs
            $query18 = $bdd -> query(
              'SELECT *
              FROM lien_utilisateur_habitat
              WHERE ID_Utilisateur="'.$element1['ID'].'"');
            $donnees18=$query18->fetch();

            $query6 = $bdd -> query(
              "SELECT `type_utilisateur`.`Nom`
              FROM type_utilisateur
              INNER JOIN lien_utilisateur_habitat
              ON `type_utilisateur`.`ID`='".$donnees18['ID_type_utilisateur']."'");
            $donnees6=$query6->fetch(); // recupère le nom du type utilisateur

            $query7 = $bdd -> query(
              'SELECT Nom, Prenom
              FROM utilisateurs
              WHERE ID="'.$element1['ID_compte_parent'].'"');
            $donnees7=$query7->fetch(); // récupère le Nom et Prenom du compte parent

            $listehabitat1 = $bdd -> query(
              "SELECT ID_Habitat
              FROM lien_utilisateur_habitat
              WHERE ID_Utilisateur='".$element1['ID']."'");
            $listeh1 = $listehabitat1 -> fetch(); // récupère l'ID de l'habitat du bon utilisateur

            $listehabitat2 = $bdd -> query(
              "SELECT Numero_de_la_rue, Rue
              FROM habitat
              WHERE ID='".$listeh1['ID_Habitat']."'");
            $listeh2 = $listehabitat2 -> fetch(); // récupère les informations de l'habitat

              ?>
            <tr>
               <td>
                 <?php
                 //echo'<a href="appadmin.php">'.$element1['Nom'].'</a>' ; // lien renvoyant à la pièce dans laquelle se trouve l'équipement
                 echo $element1['Nom'];
                 ?>
                 </td>
               <td>
                 <?php
                 echo $element1['Prenom'];
                 ?>

               </td>
               <td>
                 <?php // faire un truc qui récupère si l'utilisateur est bien connecté
                 if ($element1['Etat_connexion']==0){

                   echo "Déconnecté";
                 }
                 else {
                   echo "Connecté";
                 }
                 ?>
               </td>
               <td>
                 <?php echo $element1['Adresse_mail']; ?>
               </td>
               <td>
                 <?php echo $element1['Numero_fixe']; ?>
               </td>
               <td>
                 <?php echo $element1['Numero_Telephone']; ?>
               </td>

               <td>
                 <?php echo $element1['Date_inscription']; ?>
               </td>
               <td>
                 <?php echo $donnees6['Nom']; //type de l'utilisateur
                  ?>
               </td>
               <td>
                 <?php echo $donnees7['Nom']. " ".$donnees7['Prenom']; // nom du compte parent
                 ?>
               </td>
               <td>
                 <?php echo $listeh2['Numero_de_la_rue'] ." ". $listeh2['Rue'] ?>
               </td>

                   <?php
                   // echo $element1['ID'];
                   $id_suppressionadmin=$element1['ID'];
                   // echo $id_suppression;
                   echo '<td><a href="modification.php?id3='.$id_suppressionadmin.'">Supprimer</a></td>'; // Renvoie vers supprimer.php?id=4 par exemple
                   ?>

             </tr>
           <?php } ?>
      </tbody>
      </table>
    <?php } ?>


    <p> Ajouter un Utilisateur </p>
    <form method="post" action="appadmin.php" class="formulaire">
      <label>
        Nom :
        <input type="text" name="nom" placeholder="Ex:DUPONT" class="bas" required>
      </label>   <br>
      <label>
        Prénom :
        <input type="text" name="prenom" placeholder="Ex:David" class="bas" required>
      </label>   <br>
      <label>
        Mot de passe :
        <input type="password" name="mot_de_passe" class="bas" required>
      </label>   <br>
      <label>
        Etat de connexion :
        <input type="number" name="etat" min=0 max=1 class="bas" required>
      </label>   <br>
      <label>
        Adresse mail :
        <input type="mail" name="adresse_mail" class="bas" required>
      </label>   <br>
      <label>
        Numéro fixe :
        <input type="tel" name="numero_fixe" class="bas" required>
      </label>   <br>
      <label>
        Numéro de téléphone :
        <input type="tel" name="numero_telephone" class="bas" required>
      </label>   <br>
      <label id="type_u">
        Quel est le type de l'utilisateur ?
        <select name="type_utilisateur" class="bas">
          <option value=""> </option>
          <?php foreach($listetype as $d => $elementtype) {
          echo '<option value="' . $elementtype["Nom"] . '" >'. $elementtype["Nom"] . '</option>';
        } ?>
        </select>
      </label>   <br>
      <label id="habitat">
        Quel est l'habitat de l'utilisateur ?
        <select name="habitat" class="bas">
          <option value=""> </option>
          <?php foreach($listeh as $d => $elementh) {
          $query16 = $bdd -> query(
              "SELECT `ville`.`nom`
              FROM `ville`
              INNER JOIN `habitat`
              ON `ville`.`ID` = '".$elementh['ID_Ville']."'");
          $donnees16 = $query16->fetch(); // recupère le nom du type utilisateur
          echo '<option value="'.$elementh["ID"].'">'.$elementh["Numero_de_la_rue"] . ' '.$elementh["Rue"] . ' '.$donnees16["nom"] . ' </option>'; // affichage de tous les habitats
        } ?>
        </select>
      </label>   <br>
      <label id="compte_parent">
        Quel est le compte parent ?
        <select name="compte_parent" class="bas">
          <option value=""> </option>
          <?php foreach($listeu as $d => $elementp) {
          echo '<option value="' . $elementp["Nom"] . '">'. $elementp["Nom"] . ' '.$elementp["Prenom"].'</option>';
        } ?>
        </select>
      </label>   <br>
        <input type="submit" name="valideru" value ="Valider">
    </form>

    <p> Liste des habitats de tous les utilisateurs </p>
    <?php  if(!empty($donnees108)) { ?>
    <table>
     <thead>
       <tr>
         <th>Code postal</th>
         <th>Numero de la rue</th>
         <th>Rue </th>
         <th>Etage</th>
         <th>Numéro de l'appartement</th>
         <th>Surface</th>
         <th>Ville</th>
         <th>Pays</th>
         <th>Supprimer </th>
       </tr>
      </thead>
      <tbody>
        <?php foreach ($donnees108 as $i => $element108) {
          //Pour afficher dans le tableau
          //Jointure sql: récupérer les types des utilisateurs
            $query107 = $bdd -> query(
              'SELECT Nom
              FROM pays
              WHERE ID="'.$element108['ID_Pays'].'"');
            $donnees107=$query107->fetch(); // récupère le nom du pays

            $query109 = $bdd -> query(
              'SELECT Nom
              FROM ville
              WHERE ID="'.$element108['ID_Ville'].'"');
            $donnees109=$query109->fetch(); // récupère le nom de la ville

              ?>
            <tr>
               <td>
                 <?php
                 echo $element108['Code_postal'];
                 ?>
                 </td>
               <td>
                 <?php
                 echo $element108['Numero_de_la_rue'];
                 ?>
               </td>
               <td>
                 <?php
                 echo $element108['Rue'];
                 ?>
               </td>
               <td>
                 <?php
                 echo $element108['Etage'];
                 ?>
               </td>
               <td>
                 <?php
                 echo $element108['Numero_de_appartement'];
                 ?>
               </td>
               <td>
                 <?php
                 echo $element108['Surface'];
                 ?>
               </td>
               <td>
                 <?php
                 echo $donnees109['Nom'];
                 ?>
               </td>
               <td>
                 <?php
                 echo $donnees107['Nom'];
                 ?>
               </td>
               <?php
               // echo $element1['ID'];
               $id_suppressionadmin=$element108['ID'];
               // echo $id_suppression;
               echo '<td><a href="modification.php?id4='.$id_suppressionadmin.'">Supprimer</a></td>'; // Renvoie vers supprimer.php?id=4 par exemple
               ?>
             </tr>
           <?php } ?>
      </tbody>
      </table>
    <?php } ?>


    <p> Ajouter un Habitat </p>
    <form method="post" action="appadmin.php" class="formulaire">
      <label id="postal">
        Quel est votre code postal ?
        <input type="number" name="postal" placeholder="Ex:75006" class="bas" required>
      </label>   <br>
      <label id="Rue">
        Quelle est la rue de l'utilisateur ?
        <input type="text" name="rue" placeholder="Ex: Rue des peupliers" class="bas" required>
      </label>   <br>
      <label id="Numero_de_la_rue">
        Quelle est le numéro de la rue de l'utilisateur ?
        <input type="number" name="numero_rue" placeholder="Ex: 21" class="bas" required>
      </label>   <br>
      <label id="ville">
        Quel est la ville de l'utilisateur ?
        <select name="ville" class="bas">
          <option value=""> </option>
          <?php foreach($listev as $d => $elementh) {
          echo '<option value="' . $elementh["nom"] . '">'. $elementh["nom"] . ' </option>';
        } ?>
        </select>
      </label>   <br>
      <label id="pays">
        Quel est le pays de l'utilisateur ?
        <select name="pays" class="bas">
          <option value=""> </option>
          <?php foreach($listep as $d => $elementp) {
          echo '<option value="' . $elementp["Nom"] . '">'. $elementp["Nom"] . ' </option>';
        } ?>
        </select>
      </label>   <br>
      <label id="surface">
        Quelle est la surface de l'habitation de l'utilisateur ?
        <input type="number" name="surface" placeholder="Ex: 150" class="bas" required>
      </label>   <br>
      <label id="etage">
        Si l'utilisateur vit en appartement, quel est son étage ?
        <input type="number" name="etage" placeholder="Ex: 3" class="bas">
      </label>   <br>
      <label id="etage">
        Si l'utilisateur vit en appartement, quel est le numéro de son appartement ?
        <input type="text" name="numero_appartement" placeholder="Ex: 154 " class="bas">
      </label>   <br>
      <input type="submit" name="validerh" value ="Valider">
    </form>

    <p> Liste des villes</p>
    <?php  if(!empty($donnees1008)) { ?>
    <table>
     <thead>
       <tr>
         <th>Ville</th>
         <th>Supprimer </th>
       </tr>
      </thead>
      <tbody>
        <?php foreach ($donnees1008 as $i => $element1008) {
              ?>
            <tr>
               <td>
                 <?php
                echo $element1008['nom'];
                 ?>
                 </td>
               <?php
               // echo $element1['ID'];
               $id_suppressionadmin=$element1008['ID'];
               // echo $id_suppression;
               echo '<td><a href="modification.php?id5='.$id_suppressionadmin.'">Supprimer</a></td>'; // Renvoie vers supprimer.php?id=4 par exemple
               ?>
             </tr>
           <?php } ?>
      </tbody>
      </table>
    <?php } ?>

    <p> Ajouter une ville </p>
    <form method="post" action="appadmin.php" class="formulaire">
      <label id="v_ville">
        Quel est le nom de la ville que vous souhaitez ajouter ?
        <input type="text" name="v_ville" placeholder="Ex: Paris" class="bas" required>
      </label>   <br>
      <input type="submit" name="validerv" value ="Valider">
    </form>

    <p> Liste des pays</p>
    <?php  if(!empty($donnees10008)) { ?>
    <table>
     <thead>
       <tr>
         <th>Pays</th>
         <th>Supprimer </th>
       </tr>
      </thead>
      <tbody>
        <?php foreach ($donnees10008 as $i => $element10008) {
              ?>
            <tr>
               <td>
                 <?php
                 echo $element10008['Nom'];
                 ?>
                 </td>
               <?php
               // echo $element1['ID'];
               $id_suppressionadmin=$element10008['ID'];
               // echo $id_suppression;
               echo '<td><a href="modification.php?id6='.$id_suppressionadmin.'">Supprimer</a></td>'; // Renvoie vers supprimer.php?id=4 par exemple
               ?>
             </tr>
           <?php } ?>
      </tbody>
      </table>
    <?php } ?>

    <p> Ajouter un pays </p>
    <form method="post" action="appadmin.php" class="formulaire">
      <label id="p_pays">
        Quel est le nom du pays que vous souhaitez ajouter ?
        <input type="text" name="p_pays" placeholder="Ex: France" class="bas" required>
      </label>   <br>
      <input type="submit" name="validerp" value ="Valider">
    </form>

    <p> Liste des types d'équipement</p>
    <?php  if(!empty($donnees1009)) { ?>
    <table>
     <thead>
       <tr>
         <th>Type d'équipement</th>
         <th>Supprimer </th>
       </tr>
      </thead>
      <tbody>
        <?php foreach ($donnees1009 as $i => $element1009) {
              ?>
            <tr>
               <td>
                 <?php
                 echo $element1009['Nom'];
                 ?>
                 </td>
               <?php
               // echo $element1['ID'];
               $id_suppressionadmin=$element1009['ID'];
               // echo $id_suppression;
               echo '<td><a href="modification.php?id7='.$id_suppressionadmin.'">Supprimer</a></td>'; // Renvoie vers supprimer.php?id=4 par exemple
               ?>
             </tr>
           <?php } ?>
      </tbody>
      </table>
    <?php } ?>

    <p> Ajouter un type d'équipement </p>
    <form method="post" action="appadmin.php" class="formulaire">
      <label id="e_type_equipement">
        Quel est le nouveau type équipement que vous souhaitez ajouter ?
        <input type="text" name="e_type_equipement" placeholder="Ex: Cemac" class="bas" required>
      </label>   <br>
      <input type="submit" name="validert" value ="Valider">
    </form>

    <p> Liste des catégories d'équipement</p>
    <?php  if(!empty($donnees1019)) { ?>
    <table>
     <thead>
       <tr>
         <th>Catégorie d'équipement</th>
         <th>Supprimer </th>
       </tr>
      </thead>
      <tbody>
        <?php foreach ($donnees1019 as $i => $element1019) {
              ?>
            <tr>
               <td>
                 <?php
                    echo $element1019['Nom'];
                 ?>
                 </td>
               <?php
               // echo $element1['ID'];
               $id_suppressionadmin=$element1019['ID'];
               // echo $id_suppression;
               echo '<td><a href="modification.php?id8='.$id_suppressionadmin.'">Supprimer</a></td>'; // Renvoie vers supprimer.php?id=4 par exemple
               ?>
             </tr>
           <?php } ?>
      </tbody>
      </table>
    <?php } ?>

    <p> Ajouter une catégorie d'équipement </p>
    <form method="post" action="appadmin.php" class="formulaire">
      <label id="c_categorie_equipement">
        Quelle est la nouvelle catégorie équipement que vous souhaitez ajouter ?
        <input type="text" name="c_categorie_equipement" placeholder="Ex: Lumière" class="bas" required>
      </label>   <br>
      <input type="submit" name="validerc" value ="Valider">
    </form>

    <p> Conditions générales d'utilisation </p>
<?php
include ("cgu_admin_controleur.php");
?>
	   </body>
  </html>
