<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link href="profil.css" media="all" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="../Mise_en_page/header.css"/>
	<link rel="stylesheet" href="../Mise_en_page/footer.css"/>
	<?php require'class_manager.php';
	/*

	session_start();
	$ID=$_SESSION['ID_utilisateurs'];
	 */
	?>
	<title>Page de profil</title>
</head>

    <body>
			<header>
					<?php include("../Mise_en_page/header.html");?>
			</header>


    	<section id="profil_et_édition">
    		<!-- Information du profil et changement des informations :-->

    		<div id="info_profil">
    			<h1>Mon profil</h1>
                <?php include("info.php");?>


    		</div >


    		<div id="edition_profil">

    			<h1>Modifier mon profil</h1>

    			<form method="post" action="edition.php" >

                    <p><label>eMail</label> : <br><input type="email" name="adresse_mail" id="email"  required /><br></p>


    				<p><label>Nouveau mot de passe</label> : <br><input type="password" name="Nouveau_mot_de_passe" id="N_Mdp"  /><br></p>


    				<p><label>Tel. Mobile</label> : <br><input type="tel" name="mobile" id="mobile"  /><br></p>
    				<p><label>Tel. fix</label> : <br><input type="tel" name="fix" id="fix" /><br></p>




    				<p><input type="submit" value="Envoyer" /></p>

    			</form>

    		</div>


    	</section>


    	<section id="gestion_utilisateurs_secondaires">
    		<!-- Ajout d'utilisateur, attribution des droits, info sur les droits d'un utilisateur deja créé :-->


    		<div id="utilisateurs_secondaires">
    			<h1>Utilisateurs secondaires</h1>
                <?php
                require 'fx_vue_second.php';
                //boites_utilisateurs($ID);
                boites_utilisateurs(27);
                ?>

    		</div>
    		<div id="modif">
    		<?php //boite_modif($ID);
                boite_modif(27);?>



    		</div>

    	</section>


    </body>


		<footer>
			<?php include("../Mise_en_page/footer.php");?>
		</footer>

</html>
