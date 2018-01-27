<?php
require('cgu_admin_modele.php');
$reponse = afficherCGU();
if (isset($_POST['Contenu'])) {
  modifierCGU();
}
require('cgu_admin_vue.php');
?>
