<?php
/**
 * Fonctions liées aux contrôleurs
 */


/**
 * Détermine si le paramètre est un entier ou non
 * @param mixed $int
 * @return bool
 */
function estUnEntier($int): bool
{
    return is_numeric($int);
}

/**
 * Détermine si le paramètre est une string ou non
 *
 * @param mixed $chaine
 * @return bool
 */
function estUneChaine($chaine): bool
{
    if (empty($chaine)) {
        return false;

    } else {
        return is_string($chaine);
    }
}

function estUnMotDePasse($chaine): bool
{
    if (empty($chaine) || strlen($chaine) < 8) { // vérifie que le mot de passe n'est pas vide et que sa longueur
                                                 // est supérieur à 8 dans cet exemple là
        return false;
    } else {
        return is_string($chaine);
    }
}
?>
