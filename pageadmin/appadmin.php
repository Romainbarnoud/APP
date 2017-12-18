<?php
  $bdd = new PDO('mysql:host=localhost;dbname=husv4;charset=utf8', 'root', '');
  $query1 = $bdd -> query("SELECT * FROM utilisateurs"); // faire des jointures pour récupérer les bonnes infos
  $donnees1 =  $query1 -> fetchall();

// ajouter un utilisateur à la base de données
// traitement d'envoi du formulaire

if (isset($_POST) && !empty($_POST)){
  //valider les données
  if(isset($_POST['valider']) && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['etat']) && isset($_POST['adresse_mail'])
  && isset($_POST['numero_fixe']) && isset($_POST['numero_telephone']) && isset($_POST['type_utilisateur']) && isset($_POST['compte_parent'])
  && isset($_POST['valider']) && isset($_POST['type_utilisateur']) && isset($_POST['Rue']) && isset($_POST['Numero_de_la_rue']) && isset($_POST['ville'])){

    $idcompte_parent = $bdd -> query('SELECT ID FROM utilisateurs WHERE Nom="'.$_POST['compte_parent'].'"'); // récupère l'ID du compte parent
    $idparent = $idcompte_parent -> fetch();
    // echo $idparent['ID'];
    // faire une requete pour insérer une ligne à utilisateur
    $query = $bdd -> prepare("INSERT INTO utilisateurs(Nom,Prenom,Adresse_mail,Mot_de_passe,Numero_fixe,Numero_Telephone,Etat_connexion,Date_inscription,ID_compte_parent)
    VALUES (:Nom,:Prenom,:Adresse_mail,:Mot_de_passe,:Numero_fixe,:Numero_Telephone,:Etat_connexion, NOW(),:ID_compte_parent)");

    // Première méthode
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
      $query9 = $bdd -> prepare("INSERT INTO type_utilisateur(Nom,ID_Habitat,ID_Utilisateur)
      VALUES (:Nom,:ID_Habitat,:ID_Utilisateur)");
      $id_utilisateur = $bdd -> query('SELECT ID FROM utilisateurs WHERE Nom="'.$_POST['nom'].'" AND Prenom="'.$_POST['prenom'].'"');
      $id_u = $id_utilisateur -> fetch();

      $id_ville = $bdd -> query('SELECT ID FROM ville WHERE nom="'.$_POST['ville'].'"');
      $id_v = $id_ville -> fetch();

      $id_habitat = $bdd -> query('SELECT ID FROM habitat WHERE Rue="'.$_POST['Rue'].'" AND Numero_de_la_rue="'.$_POST['Numero_de_la_rue'].'" AND ID_Ville="'.$id_v['ID'].'" ');
      $id_h = $id_habitat -> fetch();

      $query9 -> execute(array(
        ':Nom' => $_POST['type_utilisateur'],
        ':ID_Habitat' => $id_h['ID'],
        ':ID_Utilisateur' => $id_u['ID']));

      header('location:appadmin.php');
      }
    else {
      echo "formulaire invalide";
    }
}



//pour faire des listes déroulantes dépendantes de la BDD
  $listeutilisateurs = $bdd -> query("SELECT Nom, Prenom FROM utilisateurs");
  $listeu = $listeutilisateurs -> fetchall();

  $listetypeutilisateur = $bdd -> query("SELECT Nom FROM type_utilisateur");
  $listetype = $listetypeutilisateur -> fetchall();

  $listehabitat = $bdd -> query("SELECT * FROM habitat");
  $listeh = $listehabitat -> fetchall();

  $listeville = $bdd -> query("SELECT nom FROM ville");
  $listev = $listeville -> fetchall();

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
    <p> Liste des utilisateurs de tous les utilisateurs </p>
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

            $query6 = $bdd -> query(
              "SELECT `type_utilisateur`.`Nom`
              FROM `type_utilisateur`
              INNER JOIN `utilisateurs`
              ON ID_Utilisateur = '".$element1['ID']."'");
            $donnees6=$query6->fetch(); // recupère le nom du type utilisateur



            $query7 = $bdd -> query(
              'SELECT Nom, Prenom
              FROM utilisateurs
              WHERE ID="'.$element1['ID_compte_parent'].'"');
            $donnees7=$query7->fetch(); // récupère le Nom et Prenom du compte parent

            $listehabitat1 = $bdd -> query(
              "SELECT ID_Habitat
              FROM type_utilisateur
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
    <form method="post" action="appadmin.php" id="formulaire">
      <label>
        Nom :
        <input type="text" name="nom" placeholder="Ex:DUPONT" class="bas">
      </label>   <br>
      <label>
        Prénom :
        <input type="text" name="prenom" placeholder="Ex:David" class="bas">
      </label>   <br>
      <label>
        Mot de passe :
        <input type="password" name="mot_de_passe" class="bas">
      </label>   <br>
      <label>
        Etat de connexion :
        <input type="number" name="etat" min=0 max=1 class="bas">
      </label>   <br>
      <label>
        Adresse mail :
        <input type="mail" name="adresse_mail" class="bas">
      </label>   <br>
      <label>
        Numéro fixe :
        <input type="tel" name="numero_fixe" class="bas">
      </label>   <br>
      <label>
        Numéro de téléphone :
        <input type="tel" name="numero_telephone" class="bas">
      </label>   <br>
      <label id="type">
        Quel est le type de l'utilisateur ?
        <select name="type_utilisateur" class="bas">
          <option value=""> </option>
          <?php foreach($listetype as $d => $elementtype) {
          echo '<option value="' . $elementtype["Nom"] . '" >'. $elementtype["Nom"] . '</option>';
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
      <label id="Rue">
        Quelle est la rue de l'utilisateur ?
        <select name="Rue" class="bas">
          <option value=""> </option>
          <?php foreach($listeh as $d => $elementh) {
          echo '<option value="'.$elementh["Rue"].'">'.$elementh["Rue"].'</option>';
        } ?>
        </select>
      </label>   <br>
      <label id="Numero_de_la_rue">
        Quelle est le numéro de la rue de l'utilisateur ?
        <select name="Numero_de_la_rue" class="bas">
          <option value=""> </option>
          <?php foreach($listeh as $d => $elementh) {
          echo '<option value="' . $elementh["Numero_de_la_rue"].'">'. $elementh["Numero_de_la_rue"] . '</option>';
        } ?>
        </select>
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
	   </body>
  </html>
