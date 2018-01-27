<?php
// Connexion à la BDD hus
include ("C:\wamp64\www\HUSv4\HUSv4\connexionbdd.php");
$button=$_POST['button'];

switch ($button){
    case 'delete':
        $ID=$_POST['utilisateurs'];
        $q=$bdd->prepare('DELETE FROM utilisateurs WHERE ID=?');
        $q->execute([$ID]);
        break;
    case 'add_law':
        $ID=$_POST['utilisateurs'];
        $law=$_POST['law'];
        $q=$bdd->prepare('INSERT INTO lien_droit_utilisateur(ID_Droit,ID_Utilisateur) VALUES (?,?)');
        $v=$bdd->prepare('SELECT * FROM lien_droit_utilisateur WHERE ID_Droit=? AND ID_utilisateur=?');
        $v->execute([$law,$ID]);
        if ($v->fetch()==null){
            $q->execute([$law,$ID]);
        }
        break;
    case 'del_law':
        $ID=$_POST['utilisateurs'];
        $law=$_POST['law'];
        $q=$bdd->prepare('DELETE  FROM lien_droit_utilisateur WHERE ID_Droit=? AND ID_Utilisateur=?');
        $q->execute([$law,$ID]);
        break;
    case 'add':

        $statement='INSERT INTO utilisateurs(Nom, Prenom, Adresse_mail, Mot_de_passe, Numero_fixe, Numero_Telephone, Etat_connexion, Date_inscription,ID_compte_parent) VALUES (?,?,?,?,?,?,?,?,?)';
        $q=$bdd->prepare($statement);
        $q->execute([$_POST['Nom'],$_POST['Prenom'],$_POST['Email'],$_POST['password'],$_POST['fixe'],$_POST['mob'],'0','27',date('Y-m-d')]);


        break;

}













require 'profil.php';
