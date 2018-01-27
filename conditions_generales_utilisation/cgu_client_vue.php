<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>CGU</title>
    <link rel="stylesheet" href="../Mise_en_page/header.css"/>
    <link rel="stylesheet" href="../Mise_en_page/footer.css"/>
  </head>
  <body>
    <header>
        <?php include("../Mise_en_page/header.html");?>
      </header>
<div class="TEXTE">
  <?php
while($donnees = $reponse->fetch()) {
  echo $donnees['Contenu'];
  echo '<br><br>Dernière modification le ', $donnees['Date_de_derniere_modification'];
}
?>
</div>
<footer>
  <?php include("../Mise_en_page/footer.php");?>
</footer>
  </body>
</html>
