<?php

class MaisonEdition implements JsonSerializable {

  // Attributs
  private $id_mai;
  private $nom_mai;
  private $nom_classement_mai;
  private $nom_correspondant_mai;
  private $mail_correspondant_mai;
  private $adr_adr_numero;
  private $adr_adr_rue;
  private $adr_adr_cp;
  private $adr_adr_ville;
  private $dr_adr_pays;

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
      'id' => $this->id_mai,
      'nom' => $this->nom_mai,
      'nomClassement' => $this->nom_classement_mai,
      'nomCorrespondant' => $this->nom_correspondant_mai,
      'mailCorrespondant' => $this->mail_correspondant_mai,
      'adrNumero' => $this->adr_adr_numero,
      'adrRue' => $this->adr_adr_rue,
      'adrCp' => $this->adr_adr_cp,
      'adrVille' => $this->adr_adr_ville,
      'adrPays' => $this->dr_adr_pays
    ];
  }

}
