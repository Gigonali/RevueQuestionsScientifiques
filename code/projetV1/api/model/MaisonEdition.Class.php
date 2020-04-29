<?php

class MaisonEdition implements JsonSerializable {

  // Attributs
  private $id;
  private $nom;
  private $nomClassement;
  private $nomCorrespondant;
  private $mailCorrespondant;
  private $adrNumero;
  private $adrRue;
  private $adrCp;
  private $adrVille;
  private $adrPays;

  // Constructeur
  public function __construct($data) {
    if(is_array($data)) {
      $this->fillObject($data);
    }
  }

  // Getter
  public function __get($property) {
    if (isset($this->$property)) {
        return $this->$property;
    }
  }

  // Setter
  public function __set($property, $value) {
    $this->$property = $value;
  }

  // Hydratation
  public function fillObject(array $data){
    foreach($data as $key => $value){
      $method = '__set';
      if (method_exists($this, $method)){
          $this->$method($key, $value);
      }
    }
  }

  // JSON serialize
  public function jsonSerialize() {
    return [
      'id' => $this->id,
      'nom' => $this->nom,
      'nomClassement' => $this->nomClassement,
      'nomCorrespondant' => $this->nomCorrespondant,
      'mailCorrespondant' => $this->mailCorrespondant,
      'adrNumero' => $this->adrNumero,
      'adrRue' => $this->adrRue,
      'adrCp' => $this->adrCp,
      'adrVille' => $this->adrVille,
      'adrPays' => $this->adrPays
    ];
  }

}
