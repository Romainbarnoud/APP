<!DOCTYPE html>

<html>

    <head>

        <meta charset="utf-8" />
        <link rel="stylesheet" href="../../connexion/Vue/VueConnexionStyle.css" />

        <title>HUS - Accueil</title>

    </head>


    <body>
      

        <section class="FormulaireDeCo"> <!--Formulaire de connexion-->
        

    	   <form method="post" action="../../connexion/Controleur/ControleurConnexion.php">

    	       <p><label>Adresse email</label> : <br><input type="email" name="adresse_mailF" id="adresse_mailF" maxlenght="255" required/></br></p>

    	       <p><label>Mot de passe</label> : <br><input type="password" name="mot_de_passeF" id="mot_de_passeF" minlenght="6" maxlenght="255" required/></br></p>

    	       <p><input type="submit" value="Connexion" class="bouton" /></p>

            
    	   </form>
        


            <p><a href="https://HUS.com/mdp_oublie/">Mot de passe oublié ?</a></p>


        </section>
    	

    	
    	
    </body>

</html>
