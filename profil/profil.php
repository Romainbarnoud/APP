<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link href="profil.css" media="all" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="../Mise_en_page/header.css"/>
    <link rel="stylesheet" href="../Mise_en_page/footer.css"/>
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

                    <p><label>eMail</label> : <br><input type="email" name="adresse_mail" id="email" maxlenght="255" required /></br></p>
    				

    				<p><label>Nouveau mot de passe</label> : <br><input type="password" name="Nouveau_mot_de_passe" id="N_Mdp" maxlenght="255" /></br></p>
                    

    				<p><label>Tel. Mobile</label> : <br><input type="tel" name="mobile" id="mobile" maxlenght="10" /></br></p>
    				<p><label>Tel. fix</label> : <br><input type="tel" name="fix" id="fix" maxlenght="10" /></br></p>
                    
                   


    				<p><input type="submit" value="Envoyer" /></p>
    				
    			</form>
    			
    		</div>

    		
    	</section>


    	<section id="gestion_utilisateurs_secondaires">
    		<!-- Ajout d'utilisateur, attribution des droits, info sur les droits d'un utilisateur deja créé :-->


    		<div id="utilisateurs_secondaires">
    			<h1>Utilisateurs secondaires</h1>
                <?php include("utilisateurs.php") ?>
    			
    		</div>


    		<div id="droits_utilisateurs">
    			<h1>Droits</h1>
                <?php include("droits_utilisateurs.php") ?>
    			
    		</div>
    		

    	</section>
		<footer>
			<?php include("../Mise_en_page/footer.php");?>
		</footer>
    
    </body>

</html>