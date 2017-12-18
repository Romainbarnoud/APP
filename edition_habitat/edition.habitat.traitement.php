<?php
/*
 * @ Quentin Chupin
 * - Version : présentation client
 * - XX/12/17
 */
//   session_start()

// On inclut le contrôleur associé
//include 'edition.habitat.controleur.php';
?>

<!-- Début du code de la page -->
<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; harset=UTF-8">
        <!-- Titre de l'onglet -->
        <title> HUS - Edition habitat </title>
        <!-- Style CSS amener à changer de nom !!!!!!!!!!! -->
        <link rel="stylesheet" href="edition.habitat.vueCSS.css"/>
        <link rel="stylesheet" href="../Mise_en_page/header.css"/>
        <link rel="stylesheet" href="../Mise_en_page/footer.css"/>
    </head>

<!-- Contenu de la page -->
    <body>
    <header>
        <?php include("../Mise_en_page/header.html");?>
    </header>
<?php // Check que la connexion à la BDD se fait sans erreur
try
{
    // husv4
    $bdd = new PDO('mysql:host=localhost;dbname=husv4;charset=utf8', 'root', '', 
                    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); // Précise l'erreur
}

catch (Exception $e)
{
    die('Erreur :' .$e->getMessage());
}
?>

<!-- Cadre affichage des pièces -->
		<div id="sectionPieces">
    		<h1> Mes pièces </h1>
    		
    		<a href="#"><input type="button" name="ajouter_piece" value="Ajouter"/></a>

    		<section id="cadreIconePiece"  >    		
<?php  
// Requête BDD pour afficher les pièces, ID_Habitat à changer en fonction de la Session
$query1 = $bdd->query("SELECT ID, Nom, Surface FROM pieces WHERE ID_Habitat = 1 ORDER BY Nom");
//$query1 -> execute()

while($dataPiece = $query1->fetch())
{
    // Convertit les données de la BDD en tableaux
    $liste_ID[] = $dataPiece['ID'];
    $liste_piece[] = $dataPiece['Nom']; 
    $liste_surface[] = $dataPiece['Surface'];
}
$taille_liste = count($liste_ID);

// Ajoute au cadre les pièces correspondantes
for ($i=0 ; $i<$taille_liste ; $i++)
{
    //Affiche les différentes pièces de l'habitat
    echo '<a href="edition.habitat.traitement.php?id='.$liste_ID[$i].
            '&amp;nomPiece='.$liste_piece[$i].'&amp;surface='.$liste_surface[$i].'" class="lienEdition">'
             .$liste_piece[$i].'</a>';
}
?>    		
    		</section>       		   		
    	</div>

<!-- Gère  -->	    
		<section id="sectionEdition">
    		<h1> Ma pièce </h1>  		
<?php 
// Le form, modifiable avec les boutons, Indique le nom et la surface
// 
?>    			
			<form method="post" action="" id="formulaire">
<?php 
if (isset($_GET['id']) AND isset($_GET['nomPiece']) AND isset($_GET['surface']))
{
    // Affiche les données de l'habitat
    echo '<label for="nomPiece"> Nom : </label>
          <input type="text" name="nom_piece" value="'.$_GET['nomPiece'].'" id="nomPiece" readonly/>
          <label for="surfacePiece"> Surface (m²) : </label>
          <input type="text" name="surface_piece" value="'.$_GET['surface'].'" id="surfacePiece" readonly/>';
}
?>
			<a href="#"><input type="button" name="ajouter_piece" value="Modifier"/></a>
			<a href="#"><input type="button" name="ajouter_piece" value="Supprimer"/></a>
    		</form>
<?php 
// La table est là pour afficher les capteurs.      
// th sert à indiquer à l'utilisateur à quoi correspond la colonne
?>    		    
			<table>
    			<thead>
    				<tr>
    					<th> Type </th>
    					<th> Catégorie </th>
    					<th> Nom </th>
    					<th> Etat </th>
    					<th> Date d'installation </th>
<?php //    			<th> suppression </th>?>
    				</tr>
    			</thead>
<?php  // 
?>    
				<tbody>
					
<?php 
//$queryEqType = $bdd->query('SELECT equipements.ID_type_equipement FROM equipements INNER JOIN type_equipement ON equipements.ID = type_equipement.ID');
//$dataEqType = $queryEqType->fetchall();
if (isset($_GET['id']))
{
    $query4 = $bdd->prepare('SELECT * FROM equipements WHERE ID_Piece = ?');
    $query4 -> execute(array($_GET['id']));
    
    while ($dataEq = $query4->fetch())
    {
        if ($dataEq['Etat'] == 0)
        {
            $Etat = 'Eteint';
        } else {
            $Etat = 'Allumé';
        }
        
        $queryEqType = $bdd->query('SELECT type_equipement.Nom FROM type_equipement INNER JOIN equipements ON type_equipement.ID = equipements.ID_type_equipement');
        $dataEqType = $queryEqType->fetch();
        
        $queryEqCat = $bdd->query('SELECT categorie_equipement.Nom FROM categorie_equipement INNER JOIN equipements ON categorie_equipement.ID = equipements.ID_categorie_equipement');
        $dataEqCat = $queryEqCat->fetch();
        
        echo '<tr>
            <td>'.$dataEqType['Nom'].'</td>
            <td>'.$dataEqCat['Nom'].'</td>
            <td>'.$dataEq['Nom'].'</td>
            <td>'.$Etat.'</td>
            <td>'.$dataEq['Date_installation'].'</td>
        </tr>';
    }
}
?>		
    			</tbody>	
    		</table>
    		
    		<section>
    			<h2>Ajouter un capteur</h2>
    			<label> Type du capteur :</label>
    			<select>
<?php 
$query5 = $bdd->query('SELECT Nom FROM type_equipement');
while ($dataTypeNom = $query5->fetch())
{
    echo '<option id="typeCapteur">'.$dataTypeNom['Nom'].'</option>' ;
}
?>    				
    			</select>
    			
    			<label> Catégorie du capteur :</label>
    			<select>
<?php 
$query5 = $bdd->query('SELECT Nom FROM categorie_equipement');
while ($dataCatNom = $query5->fetch())
{
    echo '<option id="typeCapteur">'.$dataCatNom['Nom'].'</option>' ;
}
?>    				
    			</select>
    			
    			<form>
    				<label for="#nomCapteur"> Nom du capteur :</label>
    				<input type="text" name="nom_capteur" id="nomCapteur" required/>
    				
    				<a href="#"><input type="button" name="ajouter_piece" value="Ajouter"/></a>
    				
    			</form>
    		</section>
    	</section>
    	<footer>
			<?php include("../Mise_en_page/footer.php");?>
		</footer>
    </body>
</html>
