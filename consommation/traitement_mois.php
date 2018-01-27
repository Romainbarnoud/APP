<?php
$c=$nb;
$dernière_année=date('Y');
$dernier_mois=date('m');
$c--;
$liste_v = array(0);
$liste_d = array(nom_mois($dernier_mois) . " " . $dernière_année);
while($c!=0){
    if($dernier_mois==1){
        $liste_v[] = 0;
        $dernier_mois=12;
        $dernière_année--;
        $liste_d[] = nom_mois($dernier_mois) . " " . $dernière_année;
    }
    else{
        $liste_v[] = 0;
        $dernier_mois--;
        $liste_d[] = nom_mois($dernier_mois) . " " . $dernière_année;
    }
    $c--;
}

function conso_mois($puissance,$date1,$date2,$liste_d,$liste_v,$dernier_mois,$dernière_année){
    list ($année1,$mois1,$semaine1,$jour1,$joursem1,$heure1)=Separedates($date1);
    list ($année2,$mois2,$semaine2,$jour2,$joursem2,$heure2)=Separedates($date2);
    
    if($année1==$année2){
        list($liste_d,$liste_v)=sep_temps_mois($puissance,$mois1,$jour1,$heure1,$mois2,$jour2,$heure2,$année1,$dernier_mois,$dernière_année,$liste_d,$liste_v);
    }
    else{
        $dernierjour=$année1 . "-12-31 23:59:59";
        list ($annéef,$moisf,$semainef,$jourf,$joursemf,$heuref)=Separedates($dernierjour);
        list($liste_d,$liste_v)=sep_temps_mois($puissance,$mois1,$jour1,$heure1,$moisf,$jourf,$heuref,$année1,$dernier_mois,$dernière_année,$liste_d,$liste_v);
        
        for($j=$année1+1;$j<$année2;$j++){
            $premierjour=$j . "-01-01 00:00:00";
            $dernierjour=$j . "-12-31 23:59:59";
            list ($annéed,$moisd,$semained,$jourd,$joursemd,$heured)=Separedates($premierjour);
            list ($annéef,$moisf,$semainef,$jourf,$joursemf,$heuref)=Separedates($dernierjour);
            list($liste_d,$liste_v)=sep_temps_mois($puissance,$moisd,$jourd,$heured,$moisf,$jourf,$heuref,$j,$dernier_mois,$dernière_année,$liste_d,$liste_v);
        }
        
        $premierjour=$année2 . "-01-01 00:00:00";
        list ($annéed,$moisd,$semained,$jourd,$joursemd,$heured)=Separedates($premierjour);
        list($liste_d,$liste_v)=sep_temps_mois($puissance,$moisd,$jourd,$heured,$mois2,$jour2,$heure2,$année2,$dernier_mois,$dernière_année,$liste_d,$liste_v);
    }
    return array($liste_d,$liste_v);
}
?>