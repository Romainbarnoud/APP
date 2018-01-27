<?php
$bdd = new PDO('mysql:host=localhost;dbname=husv4;charset=utf8', 'root', ''); //connexion a la bdd
include("ActuActFonction.php"); //importation de fonction
$IDuti = 43; //mettre $_SESSION['IDutilisateur']

date_default_timezone_set('Europe/Paris'); //définition du fuseau horaire

//ici $j contiens le jour d'aujourd'hui sous forme d'un chiffre allant de 0(dimanche) à 6(samedi), 
//on va donc transformer ça sous le même format que la colonne 'Jours_activite' dans la bdd,
//c'est à dire un chiffre allant de 2(lundi) à 8(dimanche).
// (rappel : 1 correspond à tous les jours dans cette colonne) 
$j = date("w");
$liste = [8,2,3,4,5,6,7];
$Jtoday = $liste[$j];


//création de la variable $Htoday qui correspond a l'heure actuelle sous un format de 4 chiffres,
//les deux premiers chiffres sont les heures(en base 23) et les deux seconds les minutes.
$Htoday = date("H");
$Htoday .= date("i");


// Recherche de tous les ID de fonctionnalité programmées par l'utilisateur:
$rechercheID = RechercheElementBdd('fonctionnalite_programmee', 'ID', 'ID_Utilisateur', ''.$IDuti.'');
$IDprogr = $rechercheID->fetchall();


//Pour chacunes des fonctionnalités programmées par l'utilisateur on exectute les requetes suivantes :
foreach ($IDprogr as $i => $value) 
{
    //recherche de quelques variables qu'on utilisera :
    $rechercheID = RechercheElementBdd('fonctionnalite_programmee', 'ID_Equipement', 'ID', ''.$value['ID'].'');
    $rechercheID = $rechercheID->fetch();
    $IDequi = $rechercheID['ID_Equipement']; // variable contenant l'ID de l'équipement du programme concerné
    
    $rechercheJ = RechercheElementBdd('fonctionnalite_programmee', 'Jours_activite', 'ID', ''.$value['ID'].'');
    $rechercheJ = $rechercheJ->fetch();
    $Jours = $rechercheJ['Jours_activite']; // variable contenant les jours dd'activité de l'équipement du programme concerné
    
    $rechercheE = RechercheElementBdd('fonctionnalite_programmee', 'Etat', 'ID', ''.$value['ID'].'');
    $rechercheE = $rechercheE->fetch();
    $Etat = $rechercheE['Etat'];
    
    
    //si le programme doit être activé tous les jours ou aujourd'hui ET que l'utilisateur a activé le programme on s'interresse ensuite à l'heure :
    if (((stripos($Jours, "1") !== FALSE) Or (stripos($Jours, ''.$Jtoday.'') !== FALSE)) And ($Etat == 1))
    {
        //on va chercher l'heure de début d'un programme rentré dans la bdd pour ressortir une suite de 4 chiffres repprésentant cette heure :
        $rechercheHD = RechercheElementBdd('fonctionnalite_programmee', 'Heure_Debut', 'ID', ''.$value['ID'].'');
        $rechercheHD = $rechercheHD->fetch();
        $HeureDeDebut = $rechercheHD['Heure_Debut'];
        
        $nb_chiffre = strlen($HeureDeDebut);
        if ($nb_chiffre == 1)
        {
            $HD = '000'.$HeureDeDebut.'';
        }
        elseif ($nb_chiffre == 2)
        {
            $HD = '00'.$HeureDeDebut.'';
        }
        elseif ($nb_chiffre == 3)
        {
            $h = substr($HeureDeDebut, 0, 1);
            $m = substr($HeureDeDebut, 1, 2);
            $HD = '0'.$h.''.$m.'';
        }
        elseif ($nb_chiffre == 4)
        {
            $h = substr($HeureDeDebut, 0, 2);
            $m = substr($HeureDeDebut, 2, 2);
            $HD = ''.$h.''.$m.'';
        }
        
        
        //on va chercher l'heure de fin d'un programme rentré dans la bdd pour ressortir une suite de 4 chiffres repprésentant cette heure :
        $rechercheHF = RechercheElementBdd('fonctionnalite_programmee', 'Heure_Fin', 'ID', ''.$value['ID'].'');
        $rechercheHF = $rechercheHF->fetch();
        $HeureDeFin = $rechercheHF['Heure_Fin'];
        
        $nb_chiffre = strlen($HeureDeFin);
        if ($nb_chiffre == 1)
        {
            $HF = '000'.$HeureDeFin.'';
        }
        elseif ($nb_chiffre == 2)
        {
            $HF = '00'.$HeureDeFin.'';
        }
        elseif ($nb_chiffre == 3)
        {
            $h = substr($HeureDeFin, 0, 1);
            $m = substr($HeureDeFin, 1, 2);
            $HF = '0'.$h.''.$m.'';
        }
        elseif ($nb_chiffre == 4)
        {
            $h = substr($HeureDeFin, 0, 2);
            $m = substr($HeureDeFin, 2, 2);
            $HF = ''.$h.''.$m.'';
        }
        
        
        //on s'interresse maintenant a déterminer si l'heure actuelle est dans la plage horaire délimité par l'heure de début et de fin :
                
        if ($HD <= $Htoday And $Htoday <= $HF)// si oui, on active l'actionneur en question en mettant son état à 1
        {
            $bdd->query('UPDATE equipements SET Etat = 1 WHERE 	ID = "'.$IDequi.'"');
        }
        
        else // si non, on desactive l'actionneur en question en mettant son état à 0
        {
            $bdd->query('UPDATE equipements SET Etat = 0 WHERE 	ID = "'.$IDequi.'"');;
        }
    }
    
    else // si les jours d'activations ne correspondent pas avec aujourd'hui on desactive l'actionneur en question en mettant son état à 0
    {
        $bdd->query('UPDATE equipements SET Etat = 0 WHERE 	ID = "'.$IDequi.'"');;
    }
}

?>