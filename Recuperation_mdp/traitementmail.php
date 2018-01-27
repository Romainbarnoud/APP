<?php
// connnexion à la base de données HUS
include ("C:\wamp64\www\HUSv4\HUSv4\connexionbdd.php");
//traitement du formulaire de recuperation de mot de passe
 if (isset($_POST) && !empty($_POST)){
  if(isset($_POST['valideru']) && isset($_POST['messagerie'])){
    echo"<p>
  Un message, contenant un code, vous a été envoyé sur l'addresse mail ".$_POST['messagerie'].".
  Veuillez le saisir puis entrer votre nouveau mot de passe.</p>";

  echo "
<form method='post' action='traitementmdp.php'>
  <label for='code'>
    Code :
    <input type='text' name='code'/>
  </label> </br>
  <label for='mot_de_passe'>
    Nouveau mot de passe :
    <input type='password' name='mot_de_passe'/>
  </label> </br>
  <label for='mot_de_passe_confirmation'>
    Confirmez votre nouveau mot de passe :
  <input type='password' name='mot_de_passe_confirmation'/>
  </label> </br>
<input type='submit' value='valider' name='valider2'/>
</form>
";

//envoi de mail
include ("C:\wamp64\www\HUSv4\HUSv4\Recuperation_mdp\EnvoiDeMail.php");
envoiMail_mdp($_POST['messagerie']);

//liste de l'utilisateur qui souhaite récupérer son mot de mot de passe
$query1 = $bdd -> query("SELECT * FROM utilisateurs WHERE Adresse_mail='".$_POST['messagerie']."'"); // faire des jointures pour récupérer les bonnes infos
$utilisateur =  $query1 -> fetch();

session_start();
$_SESSION['Adresse_mail']=$_POST['messagerie'];
$_SESSION['ID']=$utilisateur['ID'];

}
// else if(isset($_POST['valider2']) && isset($_POST['code']) && isset($_POST['mot_de_passe']) && isset($_POST['mot_de_passe_confirmation'])){
//   if($_POST['mot_de_passe']==$_POST['mot_de_passe_confirmation']){
//   echo $_POST['messagerie'];
//   //$udpate = $bdd -> query('UPDATE utilisateurs SET Mot_de_passe="'.$_POST['mot_de_passe'].'" WHERE ID="'.$utilisateur['ID'].'"');
//   // header('location:../connexion/Vue/VueConnexion.php');
//   }
// }
}


?>
