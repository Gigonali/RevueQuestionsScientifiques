<?php
  class Personne implements JsonSerializable {
    // Attributs
    private $id;
    private $nom;
    private $prenom;
    private $mailContact;
    private $mailConnexion;
    private $mdp;
    private $commentaire;
    private $estRescenseur;
    private $estContact;
    private $institutionCourte;
    private $institutionLongue;
    private $adresse;

    // Constructeur
    public function __construct($data){
      if(is_array($data)) {
        $this -> fillObject($data);

      } else {
        #code

      }

    }

    // Getter
    public function __get($property) {
      if(isset($this->$property)) {
          return $this->$property;
      }

    }

    // Setter
    public function __set($property, $value) {
      $this->$property = $value;
    }

    //hydratation
    public function fillObject(array $data){
      foreach($data as $key =>$value){
        $method="__set";
        if(method_exists($this,$method)){
            $this->$method($key,$value);
        }
      }
    }

    // JSON serialize
    public function jsonSerialize() {

    }

  }


?>
