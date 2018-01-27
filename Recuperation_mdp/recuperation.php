<!DOCTYPE html>
<html>
 	<head>
 	 	<title>Récupération de mot de passe</title>
     	<meta charset="utf-8"/>
  	 	<!--<link rel="stylesheet" href="style.css"/>-->
 	</head>
	<body>
		<form method="post" action="traitementmail.php">
			<!--formulaire pour l'adresse email-->
				<label>
					Veuillez saisir votre addresse mail pour récupérer votre mot de passe :
				<input type="email" name="messagerie"/>
      </label> </br>
			<!--bouton de validation de l'adresse mail et d'envoi du code-->
			<input type="submit" name="valideru" value ="Envoyer le code">
    </form>

	</body>
</html>
