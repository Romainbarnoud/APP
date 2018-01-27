<?php 
function boites_utilisateurs($ID_parent) {
    
    $manager=set_up_manager();
    $liste=list_sec($ID_parent, $manager);
    
    for ($i=0;$i<count($liste);$i++) {
        ?><h2>Informations personnelles</h2> <div id=<?php echo $liste[$i]->nom().' '.$liste[$i]->prenom() ;?>>
    	<?php 
        echo 'Nom:'.$liste[$i]->nom().'<br>';
        echo 'Prenom:'.$liste[$i]->prenom().'<br>';
        echo 'Email:'.$liste[$i]->email().'<br>';
        echo 'Telephone fixe:'.$liste[$i]->fixe().'<br>';
        echo 'Telephone mobile:'.$liste[$i]->mob().'<br>';
        
        
        $ID=$liste[$i]->id();
        $law=list_law($ID, $manager);
        
        echo '<h2>Droits</h2><br>';
        for ($y=0;$y<count($law);$y++) {
            echo $y.') '.$law[$y]->name().'<br>';
            
        }
        
        
        ?>
        </div>
        <?php
    }
    
}

function boite_modif($ID_parent){
    $manager=set_up_manager();
    $liste=list_sec($ID_parent, $manager);
    ?>
    <form action='boite_modif.php' method="post">
    <select id='utilisateurs' name="utilisateurs">
    <?php
    for ($i=0;$i<count($liste);$i++){
       echo '<option value='.$liste[$i]->id().'>'.$liste[$i]->nom().' '.$liste[$i]->prenom().'</option>'; 
       
       
       
       }  
       ?> </select>
       <?php 
    
   
    ?><select name='law'><?php 
       $law=all_list_law($manager);
       for ($y=0;$y<count($law);$y++) {
           echo '<option value='.$law[$y]->id().'>'.$law[$y]->name().'</option>';
       }
       ?>
    </select>
    
    <button name="button" id='delete'  type="submit" value="delete">Supprimer l'utilisateur</button>
    
    <button name="button" id='ajout_law' type="submit" value="add_law">Ajouter un droit</button><br>
    <button name="button" id='suppr_law' type="submit" value="del_law">Supprimer un droit</button><br>
    
    <h2>Ajout d'un nouvel utilisateur</h2>
   	<label>Nom: </label><input name="Nom" type="text"/><br>
    <label>Prenom: </label><input name="Prenom" type="text"/><br>
    <label>Adresse mail: </label><input name="Email" type="email"/><br>
    <label>Telphone fixe: </label><input name="fixe" type="tel"/><br>
    <label>Telephone mobile: </label><input name="mob" type="tel"/><br>
    <label>Mot de passe: </label><input name="password" type="password"/><br>
   
    <button name="button" id="add" type="submit" value="add">Ajout utilisateur</button>
    </form>
    <?php     
}



function set_up_manager(){
    $bdd = new PDO('mysql:host=localhost;dbname=husv4;charset=utf8', 'root', '');
    $manager=new Manager($bdd);
    return $manager;
}

function list_sec($ID,$manager){
    $liste=$manager->getList_user($ID);
    return $liste;
}

function list_law($ID,$manager){
    $liste=$manager->getLaw_user($ID);
    return $liste;
}

function all_list_law($manager){
    $law=$manager->getLaw_all();
    return $law;
   
    
}


//boites_utilisateurs(27); test
?>
