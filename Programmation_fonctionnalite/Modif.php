<?php
$bdd = new PDO('mysql:host=localhost;dbname=husv4;charset=utf8', 'root', '');


if (isset($_GET['id']) && !empty($_GET['id']))
{
    $Etat = $bdd -> query('SELECT Etat FROM fonctionnalite_programmee WHERE ID = "'.$_GET['id'].'"');
    $Etat = $Etat -> fetch();
    $Etat = $Etat['Etat'];

    switch ($Etat)
    {
        case 0:
            $bdd->query('UPDATE fonctionnalite_programmee SET Etat = 1 WHERE ID = "'.$_GET['id'].'"');
            header('location:VueProg.php');
        break;

        case 1:
            $bdd->query('UPDATE fonctionnalite_programmee SET Etat = 0 WHERE ID = "'.$_GET['id'].'"');
            header('location:VueProg.php');
        break;

        default:
            echo "error";
        break;
    }

}


if (isset($_GET['id2']) && !empty($_GET['id2']))
{
    $delete = $bdd -> query('DELETE FROM fonctionnalite_programmee WHERE ID="'.$_GET['id2'].'"');
    header('location:VueProg.php');
}

?>
