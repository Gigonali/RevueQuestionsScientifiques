<?php

class Domaine implements JsonSerializable
{

  private $id;
  private $libelle;



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
        $method = "set".ucfirst($key);

        if(method_exists($this,$method)){
            $this->$method($value);
        }
    }
  }



  public function jsonSerialize()
  {
    return ['id' => $this->__get('id'),
            'libelle' => $this->__get('libelle')
          ];
  }
}
