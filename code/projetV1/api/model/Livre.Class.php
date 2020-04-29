<?php

class Livre implements JsonSerializable {

  // Attributs
  private $id;
  private $isbn;
  private $isbnNumerique;
  private $nomAuteur;
  private $prenomAuteur;
  private $titre;
  private $annee;
  private $collection;
  private $pages;
  private $prix;
  private $brochure;
  private $respEdition;
  private $respTraduction;
  private $idEtatLivre;

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
    $dataAdresse = array();
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
      'isbn' => $this->isbn,
      'isbnNumerique' => $this->isbnNumerique,
      'nomAuteur' => $this->nomAuteur,
      'prenomAuteur' => $this->prenomAuteur,
      'titre' => $this->titre,
      'annee' => $this->annee,
      'collection' => $this->collection,
      'pages' => $this->pages,
      'prix' => $this->prix,
      'brochure' => $this->brochure,
      'respEdition' => $this->respEdition,
      'respTraduction' => $this->respTraduction,
      'idEtatLivre' => $this->idEtatLivre
    ];
  }

}
