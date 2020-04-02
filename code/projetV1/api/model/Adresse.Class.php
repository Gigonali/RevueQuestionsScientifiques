<?php

  class Adresse implements JsonSerializable {
    private $numero;
    private $rue;
    private $cp;
    private $ville;
    private $pays;

    // Constructeur
    public function __construct($data){
      if(is_array($data)) {
          $this -> fillObject($data);

      } else {


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
