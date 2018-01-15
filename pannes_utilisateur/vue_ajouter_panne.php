
<div class="formulaire_domisep">
	<br>
	<h3>Formulaire de panne TES2</h3>
<form class="" action="form_panne.php" method="post">
	<p>Équipement</p>
	<select name="capteur">
	<?php
	while ($donnees = $req->fetch()) {?>
	<option><?php echo $donnees['Nom']?></option>
	<?php } ?>
	</select>
	<p>Date de signalement</p>
	<input type="date" name="date" value="<?php echo date('Y-m-d'); ?>">
	<p>Type de panne</p>
	<textarea name="type_panne" id="" cols="25" rows="5"></textarea>
	<br>
	<br>
	<input type="submit" value="Ajouter">
	<input type="reset">
</form>
</div>
<style media="screen">

.formulaire_domisep {
	text-align: center;
	width:300px;
	height: 450px;
	background-color: #fff;
	border:1px solid black;
	font-family: Arial;
}

.formulaire_domisep form {
margin: 0 auto;
}
</style>
