<?php

  class Revue implements JsonSerializable {
    private $id_rev;
    private $numero_rev;
    private $special_helha_rev;

    // Constructeur
    public function __construct($data){
      if(is_array($data)){
        $this->fillObject($data);
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
      return [ 'id_rev' => $this->__get('id_rev'),
               'numero_rev' => $this->__get('numero_rev'),
               'special_helha_rev' => $this->__get('special_helha_rev')
              ];
    }

  }

?>
