<!DOCTYPE html>

<html>

	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="styleProg.css" />
		<link rel="stylesheet" href="../Mise_en_page/header.css"/>
		<link rel="stylesheet" href="../Mise_en_page/footer.css"/>
        <title>Fonctionnalités Programmées.</title>
    </head>

    <body>
			<header>
				<?php include("../Mise_en_page/header.html");?>
			</header>

    	<section class="contenuePage">

    		<h1>Fonctionnalités programmées :</h1> <br/>

    		<div>

    			<table>

     				<thead> <!-- définition des titres du tableau -->
       					<tr>
         				<th>Nom</th>
         				<th>Equipement concerné</th>
         				<th>Jours d'activation</th>
         				<th>Heure de début</th>
         				<th>Heure de fin</th>
         				<th>Etat</th>
         				<th>Supprimer</th>
         				</tr>
      				</thead>

      				<tbody>
      					<?php
      					$bdd = new PDO('mysql:host=localhost;dbname=husv4;charset=utf8', 'root', '');
      					session_start();
      					$IDuti = 43; //remplacer 5 par $_SESSION['IDutilisateur']

      					$tout = $bdd -> query('SELECT * FROM fonctionnalite_programmee WHERE ID_Utilisateur = "'.$IDuti.'"');
      					$tout =  $tout -> fetchall(); // variable contenant tout ce qui correspond à l'utilisateur au niveau des focntionnalités programmés



      					foreach ($tout as $i => $element) //foreach qui créé le contenue du tableau :
      					{
      					    $NomEqui = $bdd -> query('SELECT Nom FROM equipements WHERE ID = "'.$element['ID_Equipement'].'"');
      					    $NomEqui = $NomEqui -> fetch(); // variable contenant le nom de l'équipement concernant chaque fonctionnalités programmés


      					    //partie crééant la variable $Jours censé contenir les jours en toutes lettres en fonction des chiffres les représentants dans la bdd, ex : 1="tous les jours", 2 "lundi", etc :
      					    if (stripos($element['Jours_activite'], "1") !== FALSE) //on regarde si les jours activées contiennent 1 qui correspond à "tous les jours" dans le formulaire d'ajout de fonctionnolité programmé
      					    {
      					        $Jours = "Tous les jours";
      					    }

      					    else //sinon on affiche les bon jours
      					    {
      					        $Jours = null;

      					        for ($i = 2; $i <= 8; $i++)
      					        {
      					            if (stripos($element['Jours_activite'], "$i") !== FALSE)
      					            {
      					                $liste = [null,'lundi','mardi','mercredi','jeudi','vendredi','samedi','dimanche'];
      					                $Jours .= $liste[$i-1];
      					                $Jours .= " "; //la variable contiendra les jours cochés
      					            }
      					        }
      					    }


      					    //partie crééant la variable $HD censé contenir l'heure de début en fonction des chiffres rentrées dans la bdd :
      					    $nb_chiffre = strlen($element['Heure_Debut']);
      					    if ($nb_chiffre == 1)
      					    {
      					        $HD = '00:0'.$element['Heure_Debut'].'';
      					    }
      					    elseif ($nb_chiffre == 2)
      					    {
      					        $HD = '00:'.$element['Heure_Debut'].'';
      					    }
      					    elseif ($nb_chiffre == 3)
      					    {
      					        $h = substr($element['Heure_Debut'], 0, 1);
      					        $m = substr($element['Heure_Debut'], 1, 2);
      					        $HD = '0'.$h.':'.$m.'';
      					    }
      					    elseif ($nb_chiffre == 4)
      					    {
      					        $h = substr($element['Heure_Debut'], 0, 2);
      					        $m = substr($element['Heure_Debut'], 2, 2);
      					        $HD = ''.$h.':'.$m.'';
      					    }


      					    //partie crééant la variable $HF censé contenir l'heure de fin en fonction des chiffres rentrées dans la bdd :
      					    $nb_chiffre = strlen($element['Heure_Fin']);
      					    if ($nb_chiffre == 1)
      					    {
      					        $HF = '00:0'.$element['Heure_Fin'].'';
      					    }
      					    elseif ($nb_chiffre == 2)
      					    {
      					        $HF = '00:'.$element['Heure_Fin'].'';
      					    }
      					    elseif ($nb_chiffre == 3)
      					    {
      					        $h = substr($element['Heure_Fin'], 0, 1);
      					        $m = substr($element['Heure_Fin'], 1, 2);
      					        $HF = '0'.$h.':'.$m.'';
      					    }
      					    elseif ($nb_chiffre == 4)
      					    {
      					        $h = substr($element['Heure_Fin'], 0, 2);
      					        $m = substr($element['Heure_Fin'], 2, 2);
      					        $HF = ''.$h.':'.$m.'';
      					    }



      					?>
      					<tr> <!-- remplissage des lignes -->

      						<td> <br/>
                 				<?php echo $element['Nom']; ?>
               				</td>

               				<td> <br/>
                 				<?php echo $NomEqui['Nom']; ?>
               				</td>

               				<td> <br/>
                 				<?php echo $Jours; ?>
               				</td>

               				<td> <br/>
                 				<?php echo $HD; ?>
               				</td>

               				<td> <br/>
                 				<?php echo $HF; ?>
               				</td>

               				<td> <br/>
                 				<?php
                 				$id_ligne_etat = $element['ID'];

                 				if ($element['Etat'] == 1) //l'état est mis "activée" si c'est le cas dans la bdd
          					    {

          					        echo '<a style="
                                                padding:4px 10px 4px 10px;
                                                margin : 10px 0 20px 0;
	                                            font:bold 13px Arial;
                                                text-decoration: none;
	                                            background:#f5f5f5;
                                                color:green;
                                                border-radius:2px;
                                                width:100px;
                                                border:1px solid #ccc;
                                                box-shadow:1px 1px 3px #999;"
                                                                             href="Modif.php?id='.$id_ligne_etat.'">Activée</a>';
          					    }
          					    else //l'état est mis "désactivée" si c'est le cas dans la bdd
          					    {
          					        echo '<a style="
                                                padding:4px 10px 4px 10px;
                                                margin : 10px 0 20px 0;
	                                            font:bold 13px Arial;
                                                text-decoration: none;
	                                            background:#f5f5f5;
                                                color:red;
                                                border-radius:2px;
                                                width:100px;
                                                border:1px solid #ccc;
                                                box-shadow:1px 1px 3px #999;"
                                                                             href="Modif.php?id='.$id_ligne_etat.'">Désactivée</a>';
      					        }
      					        ?>
               				</td>

               				<td> <br/>
                 				<?php
                 				$id_ligne_supr = $element['ID'];
                 				echo '<a style="
                                                padding:4px 10px 4px 10px;
                                                margin : 0 0 20px 0;
	                                            font:bold 13px Arial;
                                                text-decoration: none;
	                                            background:#f5f5f5;
                                                color:#555;
                                                border-radius:2px;
                                                width:100px;
                                                border:1px solid #ccc;
                                                box-shadow:1px 1px 3px #999;"
                                                                             href="Modif.php?id2='.$id_ligne_supr.'">Suprimer</a>';
                 				?>
               				</td>

      					</tr>
      					<?php }?>
      				</tbody>
      			</table><br/><br/>

    		</div>







    		<div>
    		<h2>Configurer un nouveau programme :</h2>
    		<form method="post" action="ControleurProg.php">
    			<p><label>Choisissez un nom pour cette nouvelle fonctionnalité</label> : <input type="text" name="nomprog" id="nomprog" maxlenght="255" required/></p><br/>
    			<p><label>Choisissez votre actionneur à programmer :</label>
    				      	<select name="actionneur">
    				        <?php



    				        $bdd = new PDO('mysql:host=localhost;dbname=husv4;charset=utf8', 'root', '');
    				        session_start();
    				        $IDuti = 43; //remplacer 5 par $_SESSION['IDutilisateur']
    				        $IDhabitat = $bdd -> query('SELECT ID_Habitat FROM lien_utilisateur_habitat WHERE ID_Utilisateur = "'.$IDuti.'"');
    				        $IDhabitat = $IDhabitat -> fetch();




    				        $IDpiece = $bdd -> query('SELECT ID FROM pieces WHERE ID_Habitat = "'.$IDhabitat['ID_Habitat'].'"');
    				        $IDpiece = $IDpiece -> fetchall();





    				        $NomToutAct = $bdd->query('SELECT Nom,ID_Piece FROM equipements WHERE ID_type_equipement = 3');
    				        $NomToutAct = $NomToutAct->fetchall();



    				        foreach ($NomToutAct as $i => $value1)
    				        {
    				            foreach ($IDpiece as $d => $value2)
    				            {
    				                if ($value1['ID_Piece'] == $value2['ID'])
    				                {
    				                    echo '<option name="' . $value1['Nom'] . '" >'. $value1['Nom'] . '</option>';
    				                }
    				            }
    				        }

    				        ?>
    				        </select></p><br />

    			<p><label>Choisissez les jours d'activité : </label></p>
    				        <input type="checkbox" name="tous" id="tous" /> <label for="tous">Tous les jours</label><br />
       						<input type="checkbox" name="lundi" id="lundi" /> <label for="lundi">Lundi</label><br />
       						<input type="checkbox" name="mardi" id="mardi" /> <label for="mardi">Mardi</label><br />
       						<input type="checkbox" name="mercredi" id="mercredi" /> <label for="mercredi">Mercredi</label><br />
       						<input type="checkbox" name="jeudi" id="jeudi" /> <label for="jeudi">Jeudi</label><br />
       						<input type="checkbox" name="vendredi" id="vendredi" /> <label for="vendredi">Vendredi</label><br />
       						<input type="checkbox" name="samedi" id="samedi" /> <label for="samedi">Samedi</label><br />
       						<input type="checkbox" name="dimanche" id="dimanche" /> <label for="dimanche">Dimanche</label><br /><br />

       			<p><label>Choisissez le temps d'activité pendant ces jours : </label></p>
       				<p>Activation à
       					<select name="hd">
       						<?php
       						for ($nombre_de_lignes = 0; $nombre_de_lignes <= 23; $nombre_de_lignes++)
       						{
       						    if ($nombre_de_lignes <= 9)
       						    {
       						       echo '<option value="0' . $nombre_de_lignes . '">0' . $nombre_de_lignes . '</option>';
       						    }

       						    else
       						    {
       						        echo '<option value="' . $nombre_de_lignes . '">' . $nombre_de_lignes . '</option>';
       						    }

       						}
       						?>
       					</select>
       				h
       					<select name="md">
       						<?php
       						for ($nombre_de_lignes = 0; $nombre_de_lignes <= 59; $nombre_de_lignes++)
       						{
       						    if ($nombre_de_lignes <= 9)
       						    {
       						       echo '<option value="0' . $nombre_de_lignes . '">0' . $nombre_de_lignes . '</option>';
       						    }

       						    else
       						    {
       						        echo '<option value="' . $nombre_de_lignes . '">' . $nombre_de_lignes . '</option>';
       						    }

       						}
       						?>
       					</select>
       				</p>



       				<p>Désactivation à
       					<select name="hf">
       						<?php
       						for ($nombre_de_lignes = 0; $nombre_de_lignes <= 23; $nombre_de_lignes++)
       						{
       						    if ($nombre_de_lignes <= 9)
       						    {
       						       echo '<option value="0' . $nombre_de_lignes . '">0' . $nombre_de_lignes . '</option>';
       						    }

       						    else
       						    {
       						        echo '<option value="' . $nombre_de_lignes . '">' . $nombre_de_lignes . '</option>';
       						    }

       						}
       						?>
       					</select>
       				h
       					<select name="mf">
       						<?php
       						for ($nombre_de_lignes = 0; $nombre_de_lignes <= 59; $nombre_de_lignes++)
       						{
       						    if ($nombre_de_lignes <= 9)
       						    {
       						       echo '<option value="0' . $nombre_de_lignes . '">0' . $nombre_de_lignes . '</option>';
       						    }

       						    else
       						    {
       						        echo '<option value="' . $nombre_de_lignes . '">' . $nombre_de_lignes . '</option>';
       						    }
       						}
       						?>
       					</select>
       				</p><br />
       			<p><input type="submit" value="Enregistrer" class="bouton" /></p>
    		</form>
    		</div>
    	</section>
			<footer>
				<?php include("../Mise_en_page/footer.php");?>
			</footer>
	</body>

</html>
