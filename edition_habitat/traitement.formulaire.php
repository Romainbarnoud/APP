<?php
include 'fonction_controlleur.php';

if (isset($_POST['nom_piece']) AND isset($_POST['surface_piece']))
{
    $nompiece = analyseFormulaire($_POST['nom_piece'], 'string');
    $surfaceentree = analyseFormulaire($_POST['surface_piece'], 'int');
    echo $nompiece.' '.$surfaceentree;
    
}elseif (!isset($_POST['nom_piece'])){
    echo 'no 1';
}elseif (!isset($_POST['surface_piece'])){
    echo 'no 2';
}