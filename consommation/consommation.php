<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8" />
        <title>HUS - Ma consommation</title>
        <link rel="stylesheet" href="style.css"/>
        <link rel="stylesheet" href="../Mise_en_page/header.css"/>
        <link rel="stylesheet" href="../Mise_en_page/footer.css"/>
        <script src="https://code.highcharts.com/highcharts.js"></script>
		<script src="https://code.highcharts.com/modules/exporting.js"></script>
    </head>

    <body>
        <header>
        	<?php include("../Mise_en_page/header.html");?>
        </header>
        <form method="post" action="consommation.php" class="formulaire">
           	<p>
              <label for="affichage">Affichage</label><br />
              <select name="affichage" id="affichage">
              	 <option value="mois">Mois</option>
              	 <option value="semaines">Semaines</option>
               </select>
        	<p>
        	<p><label>Nombre</label> : <input type="number" name="nombre" value="<?php if (isset($_POST['nombre'])){
        	                                                                               echo $_POST['nombre'];
        	                                                                           }
        	                                                                           else{
        	                                                                               echo 12;
        	                                                                           }
        	                                                                     ?>"/></p>
        	<input type="submit" value="Valider" /></p>
           	</p>
        
        </form>
        <?php 
        include('modele_consommation.php');
        if (isset ($_POST['affichage'])){
            $choix=htmlspecialchars($_POST['affichage']);
        }
        else{
            $choix='mois';
        }
        if (isset ($_POST['nombre'])){
            $nb=htmlspecialchars($_POST['nombre']);
        }
        else{
            $nb=12;
        }
        if ($choix=='mois'){
            include('traitement_mois.php');
        }
        elseif ($choix=='semaines'){
            include('traitement_semaine.php');
        }
        
        session_start();
        $bdd=new PDO('mysql:host=localhost;dbname=husv4;charset=utf8','root','') ;
               
        $piece=$bdd->query('SELECT ID,Nom
                            FROM pieces
                            WHERE ID_Habitat="'.$_SESSION['IDhabitat'].'"');
        $donnée_piece=$piece->fetchAll() ;
        foreach($donnée_piece as $i => $reponse){
            $conso=$bdd->query('SELECT *
                                FROM consommation,equipements
                                WHERE equipements.ID_Piece="'.$reponse['ID'].'"
                                AND consommation.ID_Equipement=equipements.ID');
            $donnée_conso=$conso->fetchAll() ;
            foreach ($donnée_conso as $i => $reponse2) {
                $arret=htmlspecialchars($reponse2['Date_arret']);
                if (empty($reponse2['Date_arret'])){
                    $arret=date('Y-m-d H:i:s');
                }
                if ($choix=='mois'){
                    list($liste_d,$liste_v)=conso_mois($reponse2['Puissance'],$reponse2['Date_de_depart'],$arret,$liste_d,$liste_v,$dernier_mois,$dernière_année);
                }
                elseif ($choix=='semaines'){
                    list($liste_d,$liste_v)=conso_semaine($reponse2['Puissance'],$reponse2['Date_de_depart'],$arret,$liste_d,$liste_v,$dernière_semaine,$dernière_année);
                }
            }
        }
        ?>
  
        <div id="container">
			<script>
            			Highcharts.chart('container', {
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Consommation'
                },
                
                xAxis: {
                    type: 'category',
                    labels: {
                        rotation: -45,
                        style: {
                            fontSize: '13px',
                            fontFamily: 'Verdana, sans-serif'
                        }
                    }
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Energie (joules)'
                    }
                },
                legend: {
                    enabled: false
                },
                tooltip: {
                    pointFormat: 'Consommation: <b>{point.y:.1f} Joules</b>'
                },
                series: [{
                    name: 'Consommation',
                    data: [

                        <?php
                        //list($liste_d,$liste_v)=conso_mois($test1,$test2,$liste_d,$liste_v,$dernier_mois,$dernière_année);
                        for ($i=0;$i<$nb;$i++){
                         echo "['".$liste_d[$i]."', ".$liste_v[$i]."],";
                        }
                         
                        
                        ?>
                        
                    ],
                    dataLabels: {
                        //enabled: true,
                        rotation: -90,
                        color: '#FFFFFF',
                        align: 'right',
                        format: '{point.y:.1f}', // one decimal
                        y: 10, // 10 pixels down from the top
                        style: {
                            fontSize: '13px',
                            fontFamily: 'Verdana, sans-serif'
                        }
                    }
                }]
            });
            </script>
		</div>
        <footer>
			<?php include("../Mise_en_page/footer.php");?>
		</footer>
            
        
    </body>