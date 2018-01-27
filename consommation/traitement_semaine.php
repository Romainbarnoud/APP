<?php
$c=$nb;
$dernière_année=date('Y');
$dernière_semaine=date('W');
if ($dernière_semaine[0]==0){
    $dernière_semaine=$dernière_semaine[1];
}
$c--;
$liste_v = array(0);
$liste_d = array($dernière_année . " semaine " . $dernière_semaine);
while($c!=0){
    if($dernière_semaine==1){
        $liste_v[] = 0;
        $dernière_semaine=52;
        $dernière_année--;
        $liste_d[] = $dernière_année . " semaine " . $dernière_semaine;
    }
    else{
        $liste_v[] = 0;
        $dernière_semaine--;
        $liste_d[] = $dernière_année . " semaine " . $dernière_semaine;
    }
    $c--;
}
function conso_semaine($puissance,$date1,$date2,$liste_d,$liste_v,$dernière_semaine,$dernière_année){
    list ($année1,$mois1,$semaine1,$jour1,$joursem1,$heure1)=Separedates($date1);
    list ($année2,$mois2,$semaine2,$jour2,$joursem2,$heure2)=Separedates($date2);
    
    if($année1==$année2){
        list($liste_d,$liste_v)=sep_temps_semaine($puissance,$semaine1,$jour1,$joursem1,$heure1,$semaine2,$jour2,$joursem2,$heure2,$année1,$dernière_semaine,$dernière_année,$liste_d,$liste_v);
    }
    else{
        $date = new DateTime();
        $date ->setISOdate($année1, 52);
        date_modify($date , '+6 day');
        $dernierjour=$date ->format('Y-m-d');
        $formdernierjour=$dernierjour . " 23:59:59";
        list ($annéef,$moisf,$semainef,$jourf,$joursemf,$heuref)=Separedates($formdernierjour);
        list($liste_d,$liste_v)=sep_temps_semaine($puissance,$semaine1,$jour1,$joursem1,$heure1,$semainef,$jourf,$joursemf,$heuref,$année1,$dernière_semaine,$dernière_année,$liste_d,$liste_v);
        
        for($j=$année1+1;$j<$année2;$j++){
            date_modify($date , '+1 day');
            $premierjour=$date ->format('Y-m-d');
            $formpremierjour=$premierjour . " 00:00:00";
            $date = new DateTime();
            $date ->setISOdate($j, 52);
            date_modify($date , '+6 day');
            $dernierjour=$date ->format('Y-m-d');
            $formdernierjour=$dernierjour . " 23:59:59";
            list ($annéed,$moisd,$semained,$jourd,$joursemd,$heured)=Separedates($formpremierjour);
            list ($annéef,$moisf,$semainef,$jourf,$joursemf,$heuref)=Separedates($formdernierjour);
            list($liste_d,$liste_v)=sep_temps_semaine($puissance,$semained,$jourd,$joursemd,$heured,$semainef,$jourf,$joursemf,$heuref,$j,$dernière_semaine,$dernière_année,$liste_d,$liste_v);   
        }
        date_modify($date , '+1 day');
        $premierjour=$date ->format('Y-m-d');
        $formpremierjour=$premierjour . " 00:00:00";
        list ($annéed,$moisd,$semained,$jourd,$joursemd,$heured)=Separedates($formpremierjour);
        list($liste_d,$liste_v)=sep_temps_semaine($puissance,$semained,$jourd,$joursemd,$heured,$semaine2,$jour2,$joursem2,$heure2,$année2,$dernière_semaine,$dernière_année,$liste_d,$liste_v);
    }
    return array($liste_d,$liste_v);
}
?>