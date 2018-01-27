<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>CGU</title>
  </head>
  <body>

<div class="texte">
<form class="" action="cgu_admin_controleur.php" method="post">
  <?php
$donnees = $reponse->fetch();?>
    <textarea name="Contenu" rows="8" cols="80"><?php echo $donnees['Contenu'] ?></textarea>
    <br>
    <input type="submit" name="" value="Valider">
</form>
</div>
  </body>
</html>
