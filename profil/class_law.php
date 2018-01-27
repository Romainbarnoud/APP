<?php
/*
 * On crée l'objet law qui est un droit qui ira dans la boite a droits de l'utilisateur secondaire
 * ainsi chaque droit qui sera supprimé ou ajouté a la boite a droits sera ajouté ou supprimé dans 
 * la base de données.
 */
class law {
    private $_id;
    private $_name;
    
    //liste des getters
    
    public function id(){return $this->_id;}
    public function name() { return $this->_name; }
    
    //liste des setters
    
    public function setID($id) { $this->_id = (int) $id;}
    public function setNom($name) { $this->_name = $name; }
    
    //hydrate
    
    public function hydrate(array $donnees)
    {
        foreach ($donnees as $key => $value)
        {
            $method = 'set'.ucfirst($key);
            
            if (method_exists($this, $method))
            {
                $this->$method($value);
            }
        }
    }
    
    
    //fonction de construction
    public function __construct(array $donnees){
        $this->hydrate($donnees);
    }
}