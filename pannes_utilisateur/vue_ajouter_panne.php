
<div class="formulaire_domisep">
	<br>
<<<<<<< HEAD
	<h3>Formulaire de panne</h3>
=======
	<h3>Formulaire de panne</h3>
>>>>>>> 828731960e0f4b9ee5b7900f3cc0c9219ffd46b0
<form class="" action="form_panne.php" method="post">
	<p>Équipement</p>
	<select name="capteur">
	<?php
	while ($donnees = $req->fetch()) {?>
	<option><?php echo $donnees['Nom']?></option>
	<?php } ?>
	</select>
	<p>Descriptif panne</p>
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
