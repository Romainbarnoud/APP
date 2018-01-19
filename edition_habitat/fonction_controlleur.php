<?php

function analyseFormulaire($post, $type)
{
    //$caracteresinterdits = '<>(){}[]?!/\$-"\'.';
    //$taillechaine = strlen($caracteresinterdits);
    
    $post = htmlspecialchars($post);
    
/*    for ($i=0 ; $i<$taillechaine ; $i++)
    {
        if (stristr($post, $caracteresinterdits[$i]))
        {
            header('Location: formulaire.php');
        }
    }*/
    
    switch ($type)
    {
        case 'int':
            $post = (int) $post;
        break;
        case 'bool':
            $post = (bool) $post;
        break;
        case 'string':
            $post = (string) $post;
        break;
    }

    return $post;
}