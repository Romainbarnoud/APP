<?php
while($donnees = $req->fetch()) {
?>
<div id="details_panne">
  <form class="" action="form_edit_pannes.php" method="post">
  <h3 style="text-align:center;">"DETAILS DE LA PANNE"</h3>
<br>
	  <ul id="navlist1">
		  <li><strong>État de la panne</strong></li>
	    <li><strong>Capteur concerné</strong></li>
	    <li><strong>Nombre d'interventions nécessaires</strong></li>
	  </ul>
	  <ul id="navlist1">
      <li><select class="" name="etat">
        <option value="en attente"  <?php if($donnees['etat'] == "en attente") echo 'selected'?>>en attente</option>
        <option value="terminé" <?php if($donnees['etat'] == "terminé") echo 'selected'?>>terminé</option>
      </select></li>
      <li> <input type="text" name="capteur" value="<?php echo $donnees['capteur']?>"> </li>
	    <li> <input type="text" name="nbre_interventions_necessaires" value="<?php echo $donnees['nbre_interventions_necessaires']?>"></li>
	  </ul>
		  <ul id="navlist1">
			  <li><strong>Type de panne</strong></li>
		    <li><strong>Derniere panne du capteur</strong></li>
		    <li><strong>Dates d'intervention passées</strong></li>
		  </ul>
      <ul id="navlist1">
        <li> <input type="text" name="type_panne" value="<?php echo $donnees['type_panne']?>"></li>
        <li> <input type="date" name="date" value="<?php echo $donnees['date_intervention']?>"></li>
        <li> <input type="text" name="dates_passees" value="<?php echo $donnees['dates_passees']?>"></li>
      </ul>
      <input type="text" name="id" value="<?php echo $donnees['id']?>" style="display:none;">
      <input type="submit" class="submit" value="Modifier">
    </form>
</div>
<br>
<?php } ?>
