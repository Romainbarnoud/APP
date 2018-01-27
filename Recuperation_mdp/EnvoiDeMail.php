<?php


function mdpAleatoire($nb_car, $chaine = 'azertyuiopqsdfghjklmwxcvbnABCDEFGHIJKLMNOPQRSTUVWXYZ123456789%!?$')
{
    $nb_lettres = strlen($chaine) - 1;
    $generation = '';

    for($i=0; $i < $nb_car; $i++)
    {
        $pos = mt_rand(0, $nb_lettres);
        $car = $chaine[$pos];
        $generation .= $car;
    }
    return $generation;
}



function envoiMail_mdp($mail)
{
    $code = mdpAleatoire(5);
    setcookie('code', $code, time() + 365*24*3600, null, null, false, true);
    if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail)) // On filtre les serveurs qui rencontrent des bogues.
    {
        $passage_ligne = "\r\n";
    }
    else
    {
        $passage_ligne = "\n";
    }
    //=====D�claration des messages au format HTML.
    $message_html = "<html><head></head><body><p>Bonjour cher(e) client(e),</p>

    Votre demande de soucrire à un nouveau mot de passe a bien été prise en compte.<br>
    Vous devez saisir le code suivant : <strong>$code</strong> pour pouvoir modifier votre nouveau mot de passe<br>

    Cordialement,<br>
    l'équipe DOMISEP.
    </body></html>";
    //==========

    //=====Cr�ation de la boundary
    $boundary = "-----=".md5(rand());
    //==========

    //=====D�finition du sujet.
    $sujet = "Votre code pour changer de mot de passe";
    //=========

    //=====Cr�ation du header de l'e-mail.
    $header = "From: \"DOMISEP\"<domisep@gmail.com>".$passage_ligne;
    $header.= "Reply-to: \"DOMISEP\" <domisep@gmail.com>".$passage_ligne;
    $header.= "MIME-Version: 1.0".$passage_ligne;
    $header.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;
    //==========

    //=====Cr�ation du message.
    $message = $passage_ligne."--".$boundary.$passage_ligne;
    $message.= "Content-Type: text/html; charset=\"ISO-8859-1\"".$passage_ligne;
    $message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
    $message.= $passage_ligne.$message_html.$passage_ligne;
    //==========
    $message.= $passage_ligne."--".$boundary."--".$passage_ligne;
    $message.= $passage_ligne."--".$boundary."--".$passage_ligne;
    //==========

    //=====Envoi de l'e-mail.
    return mail($mail,$sujet,$message,$header);
    //==========
}
?>
