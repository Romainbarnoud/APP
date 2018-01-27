<?php
/*L'objectif est de gerer les utilisateurs secondaires d'un utilisateur
 * en considérant l'utilisateur secondaire comme un objet
 */
require 'class_law.php';
require 'class_secondaire.php';
class manager {
    private $_db;
    
    public function __construct($db) { $this->setDb($db);}//Notre constructeur
    
    
    
    //FONCTIONS UTILISATEURS SECONDAIRES
    
    public function getList_user($ID){ //liste des utilisateurs secondaires fonctionne
        $second = [];
        
        $q = $this->_db->prepare('SELECT ID, Nom , Prenom , 
            Adresse_mail,Numero_fixe,Numero_Telephone FROM utilisateurs WHERE ID_compte_parent=?');
        $q->execute([$ID]);
        
        while ($donnees=$q->fetch()){
            $second[]= new Secondaire($donnees);
            
            }
       return $second;//retourne une liste d'objet. Chaque objet est un utilisateur secondaire
       /*
        * $q=$manager->seeList_user(28);
           echo $q[0]->nom(); 
           methode pour sortir un élément
        */
      
    }
    
    
   
    //FONCTION DROITS

   
    
    public function getLaw_user($ID){ //liste des droits d'un utilisateur fonctionne 
        $law = [];
        
        $q = $this->_db->prepare('SELECT * FROM droits d INNER JOIN lien_droit_utilisateur l ON l.ID_Droit=d.ID WHERE l.ID_utilisateur=? ');
        $q->execute([$ID]);
        
        while ($donnees=$q->fetch()){
            $law[]= new law($donnees);
        }
        return $law;
    }
    
    public function getLaw_all(){
        $law=[];
        $q=$this->_db->query("SELECT * FROM droits;");
        while ($donnees=$q->fetch()){
            $law[]=new law($donnees);
        }
        return $law;
    }
    
    
    //ON SET LA BASE DE DONNEE.
    
    public function setDb($db){
        $this->_db=$db;
    }
}

?>