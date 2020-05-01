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
    private $adrNum;
    private $adrRue;
    private $adrCp;
    private $adrVille;
    private $adrPays;
    private $code;

    // Constructeur
    public function __construct($data){
      if(is_array($data)) {
        $this -> fillObject($data);

      }
    }

    // Getter
    public function __get($property) {
      echo $this->$property;
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
      return [ 'id' => $this->__get('id'),
      'nom' => $this->__get('nom'),
      'prenom' => $this->__get('prenom'),
      'mailContact' => $this->__get('mailContact'),
      'mailConnexion' => $this->__get('mailConnexion'),
      'mdp' => $this->__get('mdp'),
      'commentaire' => $this->__get('commentaire'),
      'estRescenseur' => $this->__get('estRescenseur'),
      'estContact' => $this->__get('estContact'),
      'institutionCourte' => $this->__get('institutionCourte'),
      'institutionLongue' => $this->__get('institutionLongue'),
      'adrNum' => $this->__get('adrNum'),
      'adrRue' => $this->__get('adrRue'),
      'adrCp' => $this->__get('adrCp'),
      'adrVille' => $this->__get('adrVille'),
      'adrPays' => $this->__get('adrPays'),
      'code' => $this->__get('code')
     ];

    }



  }


?>
