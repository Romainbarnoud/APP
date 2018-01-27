<?php
function Separedates($date){
    $année=$date[0] . $date[1] . $date[2] . $date[3];
    $mois=$date[5] . $date[6];
    if($mois<10){
        $mois=$mois[1];
    }
    $jour=$date[8] . $date[9];
    $heure=$date[11] . $date[12];
    $minute=$date[14] . $date[15];
    $seconde=$date[17] . $date[18];
    $minute=$minute+$seconde/60;
    $heure=$heure+$minute/60;
    $formdate=$année . "-" . $mois . "-" . $jour;
    $semaine=date('W',strtotime ($formdate));
    if($semaine<10){
        $semaine=$semaine[1];
    }
    $joursem=date('N',strtotime ($formdate));
    /*echo "année ".$année."<br/>";
    echo "mois".$mois."<br/>";
    echo "semaine".$semaine."<br/>";
    echo "jour".$jour."<br/>";
    echo "jour de la semaine".$joursem."<br/>";
    echo "heure".$heure."<br/>";
    echo "<br/>";*/
    return array ($année,$mois,$semaine,$jour,$joursem,$heure);
}

function nbjm($mois,$année){
    if ($mois==1 or $mois==3 or $mois==5 or $mois==7 or $mois==8 or $mois==10 or $mois==12){
        return 31;
    }
    elseif($mois==2){
        if ($année%4==0){
            return 29;
        }
        else{
            return 28;
        }
    }
    else{
        return 30;
    }
}

function nom_mois($i){
    if($i==1){
        return 'Janvier';
    }
    elseif($i==2){
        return 'Février';
    }
    elseif($i==3){
        return 'Mars';
    }
    elseif($i==4){
        return 'Avril';
    }
    elseif($i==5){
        return 'Mai';
    }
    elseif($i==6){
        return 'Juin';
    }
    elseif($i==7){
        return 'Juillet';
    }
    elseif($i==8){
        return 'Août';
    }
    elseif($i==9){
        return 'Septembre';
    }
    elseif($i==10){
        return 'Octrobre';
    }
    elseif($i==11){
        return 'Novembre';
    }
    else{
        return 'Décembre';
    }
}

function sep_temps_mois($puissance,$mois1,$jour1,$heure1,$mois2,$jour2,$heure2,$année,$dernier_mois,$dernière_année,$liste_d,$liste_v){
    
    if($mois1==$mois2){
        $temps=24-$heure1+$heure2+24*($jour2-$jour1-1);
        if($année>$dernière_année){
            $k=array_keys($liste_d, nom_mois($mois1) . " " . $année)[0];
            $liste_v[$k]=$liste_v[$k]+$temps*$puissance;
        }
        elseif($année=$dernière_année AND $mois1>=$dernier_mois){
            $k=array_keys($liste_d, nom_mois($mois1) . " " . $année)[0];
            $liste_v[$k]=$liste_v[$k]+$temps*$puissance;
        }
    }
    
    else{
        $temps=24-$heure1+24*(nbjm($mois1,$année)-$jour1);
        if($année>$dernière_année){
            $k=array_keys($liste_d, nom_mois($mois1) . " " . $année)[0];
            $liste_v[$k]=$liste_v[$k]+$temps*$puissance;
        }
        elseif($année==$dernière_année AND $mois1>=$dernier_mois){
            $k=array_keys($liste_d, nom_mois($mois1) . " " . $année)[0];
            $liste_v[$k]=$liste_v[$k]+$temps*$puissance;
        }
        for ($i=$mois1+1;$i<$mois2;$i++){
            $temps=24*nbjm($i,$année);
            if($année>$dernière_année){
                $k=array_keys($liste_d, nom_mois($i) . " " . $année)[0];
                $liste_v[$k]=$liste_v[$k]+$temps*$puissance;
            }
            elseif($année==$dernière_année AND $i>=$dernier_mois){
                $k=array_keys($liste_d, nom_mois($i) . " " . $année)[0];
                $liste_v[$k]=$liste_v[$k]+$temps*$puissance;
            }
        }
        $temps=24*($jour2-1)+$heure2;
        if($année>$dernière_année){
            $k=array_keys($liste_d, nom_mois($mois2) . " " . $année)[0];
            $liste_v[$k]=$liste_v[$k]+$temps*$puissance;
        }
        elseif($année==$dernière_année AND $mois2>=$dernier_mois){
            $k=array_keys($liste_d, nom_mois($mois2) . " " . $année)[0];
            $liste_v[$k]=$liste_v[$k]+$temps*$puissance;
        }
    }
    
    return array($liste_d,$liste_v);
    
}

function sep_temps_semaine($puissance,$semaine1,$jour1,$joursem1,$heure1,$semaine2,$jour2,$joursem2,$heure2,$année,$dernière_semaine,$dernière_année,$liste_d,$liste_v){
    if($semaine1==$semaine2){
        $temps=24-$heure1+$heure2+24*($jour2-$jour1-1);
        if($année>$dernière_année){
            $k=array_keys($liste_d, $année . " semaine " . $semaine1)[0];
            $liste_v[$k]=$liste_v[$k]+$temps*$puissance;
        }
        elseif($année==$dernière_année AND $semaine1>=$dernière_semaine){
            $k=array_keys($liste_d, $année . " semaine " . $semaine1)[0];
            $liste_v[$k]=$liste_v[$k]+$temps*$puissance;
        }
    }
    else{
        $temps=24-$heure1+24*(7-$joursem1);
        if($année>$dernière_année){
            $k=array_keys($liste_d, $année . " semaine " . $semaine1)[0];
            $liste_v[$k]=$liste_v[$k]+$temps*$puissance;
        }
        elseif($année==$dernière_année AND $semaine1>=$dernière_semaine){
            $k=array_keys($liste_d, $année . " semaine " . $semaine1)[0];
            $liste_v[$k]=$liste_v[$k]+$temps*$puissance;
        }
        for ($i=$semaine1+1;$i<$semaine2;$i++){
            $temps=24*7;
            if($année>$dernière_année){
                $k=array_keys($liste_d, $année . " semaine " . $i)[0];
                $liste_v[$k]=$liste_v[$k]+$temps*$puissance;
            }
            elseif($année==$dernière_année AND $i>=$dernière_semaine){
                $k=array_keys($liste_d, $année . " semaine " . $i)[0];
                $liste_v[$k]=$liste_v[$k]+$temps*$puissance;
            }
        }
        $temps=24*($joursem2-1)+$heure2;
        if($année>$dernière_année){
            $k=array_keys($liste_d, $année . " semaine " . $semaine2)[0];
            $liste_v[$k]=$liste_v[$k]+$temps*$puissance;
        }
        elseif($année==$dernière_année AND $semaine2>=$dernière_semaine){
            $k=array_keys($liste_d, $année . " semaine " . $semaine2)[0];
            $liste_v[$k]=$liste_v[$k]+$temps*$puissance;
        }
    }
    return array($liste_d,$liste_v);
}
?>