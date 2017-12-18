<?php while($donnees = $req->fetch()) { ?>
<div id="details_panne">
  <br>
  <h3 style="text-align:center;">"DETAILS DE LA PANNE"</h3>
<br>
	  <ul id="navlist1">
		  <li><strong>État de la panne</strong></li>
	    <li><strong>Capteur concerné</strong></li>
	    <li><strong>Nombre d'interventions nécessaires</strong></li>
	  </ul>
	  <ul id="navlist1">
		  <li><?php echo $donnees['etat']?></li>
		  <li><?php echo $donnees['capteur']?></li>
	    <li><?php echo $donnees['nbre_interventions_necessaires'] ?></li>
	  </ul>
		  <ul id="navlist1">
			  <li><strong>Type de panne</strong></li>
		    <li><strong>Derniere panne du capteur</strong></li>
		    <li><strong>Dates d'intervention passées</strong></li>
		  </ul>
      <ul id="navlist1">
        <li><?php echo $donnees['type_panne']?></li>
        <li><?php echo $donnees['date']?></li>
        <li><?php echo $donnees['dates_passees']?></li>
      </ul>
</div>
<br>
<?php }
include("../Mise_en_page/footer.php");
?>
