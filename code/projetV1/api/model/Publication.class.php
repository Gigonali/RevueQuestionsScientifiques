<?php

  class Publication implements JsonSerializable {
    private $id_pub;
    private $titre_pub;
    private $resume_pub;
    private $lieu_pub;
    private $date_pub;
    private $plagiat_pub;
    private $id_pub_ref;
    private $id_etat_pub;
    private $id_type;
    private $id_rev;

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
      return [ 'id_pub' => $this->__get('id_pub'),
               'titre_pub' => $this->__get('titre_pub'),
               'resume_pub' => $this->__get('resume_pub'),
               'lieu_pub' => $this->__get('lieu_pub'),
               'date_pub' => $this->__get('date_pub'),
               'plagiat_pub' => $this->__get('plagiat_pub'),
               'id_pub_ref' => $this->__get('id_pub_ref'),
               'id_etat_pub' => $this->__get('id_etat_pub'),
               'id_type' => $this->__get('id_type'),
               'id_rev' => $this->__get('id_rev')
              ];
    }

  }

?>
