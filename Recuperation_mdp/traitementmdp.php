<?php
// connnexion à la base de données HUS
include ("C:\wamp64\www\HUSv4\HUSv4\connexionbdd.php");
session_start();
if(isset($_POST['valider2']) && isset($_POST['code']) && isset($_POST['mot_de_passe']) && isset($_POST['mot_de_passe_confirmation'])){
  if($_POST['mot_de_passe']==$_POST['mot_de_passe_confirmation'] && $_POST['code']==$_COOKIE['code']){
  $udpate = $bdd -> query('UPDATE utilisateurs SET Mot_de_passe="'.$_POST['mot_de_passe'].'" WHERE ID="'.$_SESSION['ID'].'"');
  session_destroy();
  header('location:../connexion/Vue/VueConnexion.php');
  }
  else
  {
    echo "Les informations ont mal été renseignées";
  }
}

?>
