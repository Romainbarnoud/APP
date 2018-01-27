<?php

class secondaire {
    
    //liste des attributs
    private $_ID;
    private $_nom;
    private $_prenom;
    private $_Numero_fixe;
    private $_Numero_Telephone;
    private $_email;
    private $_id_parent;
    
    //liste des getters
    
    public function id_parent(){return $this->_id_parent;}
    public function nom() { return $this->_nom; }
    public function prenom() { return $this->_prenom; }
    public function fixe() { return $this->_Numero_fixe; }
    public function mob() { return $this->_Numero_Telephone;}
    public function email() { return $this->_email;}
    public function  id() { return $this->_ID;}
    
    
    //liste des setters
    
    public function setId_parent($id){ $this->_id_parent =(int) $id;}
    public function setId($id) { $this->_ID = (int) $id;}
    public function setNom($nom) { $this->_nom = $nom; }
    public function setNumero_fixe($fixe) { $this->_Numero_fixe = $fixe; }
    public function setNumero_Telephone($mob) { $this->_Numero_Telephone = $mob; }
    public function setPrenom($prenom) { $this->_prenom = $prenom; }
    public function setAdresse_mail($email) { $this->_email = $email; }
    
    //fonction d'hydratation
    
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