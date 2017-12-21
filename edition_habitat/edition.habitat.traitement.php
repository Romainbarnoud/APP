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
        <meta charset="utf-8" />
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
    		<!-- Bouton d'ajout de pièces -->
    		<a href="edition.habitat.traitement.php?ajout=1&amp;modifier=0#sectionEdition"><input type="button" name="ajouter_piece" value="Ajouter"/></a>
			<!-- Conteneur des différentes pièces -->
    		<section id="cadreIconePiece"  >
<?php
// Requête BDD pour afficher les pièces, ID_Habitat à changer en fonction de la Session
$query1 = $bdd->query("SELECT ID, Nom, Surface FROM pieces WHERE ID_Habitat = 1 ORDER BY Nom");

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
    echo '<a href="edition.habitat.traitement.php?id='.$liste_ID[$i].'&amp;nomPiece='.$liste_piece[$i].
            '&amp;surface='.$liste_surface[$i].'#sectionEdition" class="lienEdition">'
             .$liste_piece[$i].'</a>';
}
?>
    		</section>
    	</div>

<!-- Cadre servant à l'edition des pièces et des capteurs  -->
		<section id="sectionEdition">
<?php
// Vérifie si la pièce est nouvelle ou non et change le titre en fonction
        if (isset($_GET['ajout']) AND $_GET['ajout'] == 1)
        {
            echo'<h1> Ma nouvelle pièce </h1>';
        }
        else
        {
            echo '<h1> Ma pièce </h1> ';
        }


?>
			<a href="edition.habitat.traitement.php"><input type="button" name="retour" value="Retour"/></a>
<?php
// Affichage dynamique du cadre de la pièce si des variables sont passées par l'URL
if (!empty($_GET['id']) OR !empty($_GET['nomPiece']) OR !empty($_GET['surface']) OR !empty($_GET['modifier']) OR !empty($_GET['ajout']))
{
//    $ID_Piece = $_GET['id'];
?>
<!-- Le form, modifiable avec les boutons, Indique le nom et la surface -->
			<form method="post" action="" id="formulaire">
<?php
if (isset($_GET['id']) AND isset($_GET['nomPiece']) AND isset($_GET['surface']))
{
    // Affiche les données de l'habitat
    echo '<label for="nomPiece"> Nom : </label>
          <input type="text" name="nom_piece" value="'.$_GET['nomPiece'].'" id="nomPiece" readonly/>
          <label for="surfacePiece"> Surface (m²) : </label>
          <input type="text" name="surface_piece" value="'.$_GET['surface'].'" id="surfacePiece" readonly/>';
    echo '<a href="edition.habitat.traitement.php?ajout=0&amp;modifier=1&amp;id='.$_GET['id'].'#sectionEdition"><input type="button" name="modifier_piece" value="Modifier"/></a>';
}
elseif (isset($_GET['ajout']) AND isset($_GET['modifier']))
{
    // Affiche des inputs aux contenus différents si la pièce est modifiée ou créée
    if ($_GET['modifier'] == 0)
    {
        $holderNom = 'Ex: Nouvelle Pièce';
        $holderSurface = 'Ex: 42';
    }
    elseif ($_GET['ajout'] == 0)
    {
        $holderNom = 'Nouveau Nom';
        $holderSurface = 'Nouvelle Surface';
    }
    echo '<label for="nomPiece"> Nom : </label>
          <input type="text" name="nom_piece" placeholder="'.$holderNom.'" id="nomPiece" maxlength="20" size="30" required/>
          <label for="surfacePiece"> Surface (m²) : </label>
          <input type="text" name="surface_piece" placeholder="'.$holderSurface.'" id="surfacePiece" maxlength="20" required/>
          <input type="submit" value="Valider">';
}
?>
				</form>


<?php
// Traitement des données de formulaire On vérifie en premier lieu que tout est reçue
/*if (isset($_POST['nom_piece']) AND isset($_POST['nom_surface']))
{
 * //On vérifie que la surface est un entier
 * $_POST['nom_surface'] = (int) $_POST['nom_surface'];
 * $piece = $_POST ['nom_piece'];
 * $surface = $_POST['nom_surface'];

    // On distingue le cas de l'ajout et de la modification
    if (isset($_GET['ajout']) AND $_GET['ajout'] == 1)
    {
        // On écrit dans la bas de données
        $query6 = $bdd->prepare('INSERT INTO pieces (Nom, Surface, ID_Habitat) VALUES (:Nom, :Surface, :ID_Habitat)');
        $query6->execute(array('Nom' => $piece,
                                'Surface' => $surface,
                                'ID_Habitat' => $ID_Hab));

    }
    if (isset($_GET['modifier']) AND $_GET['modifier'] == 1)
    {
        // On update la base de données
        $req = $bdd->prepare('UPDATE pieces SET Nom = :nv_nom, Surface = :nv_surface WHERE ID = ?');
        $req->execute(array('nv_nom' => $piece, 'nv_surface' => $surface, $ID_Piece));
    }
    // On traite les données du capteur
}*/
?>

<!-- Affiche la table des différents capteurs -->
			<table>
				<!-- En-tête du tableau -->
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

 				<!-- Corps du tableau -->
				<tbody>

<?php
if (isset($_GET['id']))
{
    // On sélectionne les champs la table des équipements de la pièce sélectionnée
    $query4 = $bdd->prepare('SELECT * FROM equipements WHERE ID_Piece = ?');
    $query4 -> execute(array($_GET['id']));

    // On affiche une à une chaque ligne du tableau suivant les conditions au-dessus
    while ($dataEq = $query4->fetch())
    {
        // On remplace 0 par éteint et 1 par allumé
        if ($dataEq['Etat'] == 0)
        {
            $Etat = 'Eteint';
        } else {
            $Etat = 'Allumé';
        }

/*
 * Jointures faites entre la table équipements et les tables type et catégorie
 * On récupère le nom du type et de la catégorie et on le lie à l'ID correspondant dans la table équipement
 */
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

		<!-- Section d'ajout du capteur dans le formulaire -->
			<h2>Ajouter un équipement</h2>

			<form method="post" action="" id="formulaire">
			<!-- Défini le type qui va être envoyé par le formulaire -->
			<label> Type de l'équipement :</label>
			<select name="choixType">
<?php
$query5 = $bdd->query('SELECT Nom FROM type_equipement');
while ($dataTypeNom = $query5->fetch())
{
    $i=1;
    echo '<option value="typeCapteur'.$i.'">'.$dataTypeNom['Nom'].'</option>' ;
    $i++;
}
?>
    			</select>

    			<!-- Défini la catégorie qui va être envoyée par le formulaire -->
    			<label> Catégorie de l'équipement :</label>
    			<select name="choixCat">
<?php
$query5 = $bdd->query('SELECT * FROM categorie_equipement');
while ($dataCatNom = $query5->fetch())
{
    $i=1;
    echo '<option value="catCapteur'.$i.'">'.$dataCatNom['Nom'].'</option>' ;
    $i++;
}
?>
    			</select> <br/><br/>

    			<label for="nomCapteur"> Nom du capteur :</label>
    			<input type="text" name="nom_capteur" id="nomCapteur" maxlength="20" size="30" required/> <br/><br/>

				<input type="submit" value="Valider">
			</form>
<?php
} // Ferme la boucle de l'affichage dynamique de la pièce
?>
		</section>
    	<footer>
			<?php include("../Mise_en_page/footer.php");?>
		</footer>
    </body>
</html>
