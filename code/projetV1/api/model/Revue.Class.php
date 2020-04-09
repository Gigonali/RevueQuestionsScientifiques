<?php

  class Revue implements JsonSerializable {
    private $id;
    private $numero;
    private $specialHELHa;

    // Constructeur
    public function __construct($data){
      if(is_array($data)){
        $this -> fillObject($data);
      } else {
        throw new Exception($error);
      }

    }

    // Getter
    public function __get($property) {
      if(isset($this->$property)) {
          return $this->$property;
      }

    }

    // Setter
    public function setNumero($nNum) {
      return $this->$numero = $nNum;
    }

    public function setSpecialHELHa($isSpecial) {
      return $this->$isSpecial;
    }

    //hydratation
    public function fillObject(array $data){
      foreach($data as $key =>$value){
          $method = "set".ucfirst($key);

          if(method_exists($this,$method)){
              $this->$method($value);
          }
      }
    }

    // JSON serialize
    public function jsonSerialize() {
      return [ 'id' => $this->__get('id'),
               'numero' => $this->__get('numero'),
               'specialHELHa' => $this->__get('specialHELHa')
              ];
    }

  }

?>
