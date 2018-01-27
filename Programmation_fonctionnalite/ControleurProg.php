<?php


$bdd = new PDO('mysql:host=localhost;dbname=husv4;charset=utf8', 'root', '');


$Nom = $_POST['nomprog'];

$Act = $_POST['actionneur'];
$IDAct = $bdd -> query('SELECT ID FROM equipements WHERE Nom = "'.$Act.'"');
$IDAct = $IDAct -> fetch();
$IDAct = $IDAct['ID'];

$hd = $_POST['hd'];
$md = $_POST['md'];
$hf = $_POST['hf'];
$mf = $_POST['mf'];

$HD = $hd.$md;
$HF = $hf.$mf;

$liste = ['tous','lundi','mardi','mercredi','jeudi','vendredi','samedi','dimanche'];

$Jours = null;

for ($i = 0; $i <= 7; $i++)
{
    if (isset($_POST[$liste[$i]])) 
    {
        $Jours .= $i+1;
    }
}

session_start();
$IDuti = 43; //remplacer 5 par $_SESSION['IDutilisateur']

echo $Nom;
echo $IDAct;
echo $Jours;
echo $HD;
echo $HF;

$insertion = $bdd->prepare('INSERT INTO fonctionnalite_programmee(ID_Utilisateur, Nom, Etat, ID_Equipement, Jours_activite, Heure_Debut, Heure_Fin) VALUES(:ID_Utilisateur, :Nom, :Etat, :ID_Equipement, :Jours_activite, :Heure_Debut, :Heure_Fin)');
$insertion -> execute(array(
                ':ID_Utilisateur'=>$IDuti,
                ':Nom'=>$Nom,
                ':Etat'=>1,
                ':ID_Equipement'=>$IDAct,
                ':Jours_activite'=>$Jours,
                ':Heure_Debut'=>$HD,
                ':Heure_Fin'=>$HF
                            ));


header('location:VueProg.php');






?>