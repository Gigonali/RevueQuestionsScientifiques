<?php
  class Personne implements JsonSerializable {
    // Attributs
    private $id_pers;
    private $nom_pers;
    private $prenom_pers;
    private $mail_contact_pers;
    private $mail_connexion_pers;
    private $mdp_pers;
    private $commentaire_pers;
    private $estRecenseur_pers;
    private $estContact_pers;
    private $institution_courte_pers;
    private $institution_longue_pers;
    private $adr_num_pers;
    private $adr_rue_pers;
    private $adr_cp_pers;
    private $adr_ville_pers;
    private $adr_pays_pers;
    private $code_pers;

    // Constructeur
    public function __construct($data){
      if(is_array($data)) {
        $this -> fillObject($data);

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
      return [ 'id_pers' => $this->__get('id_pers'),
               'nom_pers' => $this->__get('nom_pers'),
               'prenom_pers' => $this->__get('prenom_pers'),
               'mail_contact_pers' => $this->__get('mail_contact_pers'),
               'mail_connexion_pers' => $this->__get('mail_connexion_pers'),
               'mdp_pers' => $this->__get('mdp_pers'),
               'commentaire_pers' => $this->__get('commentaire_pers'),
               'estRecenseur_pers' => $this->__get('estRecenseur_pers'),
               'estContact_pers' => $this->__get('estContact_pers'),
               'institution_courte_pers' => $this->__get('institution_courte_pers'),
               'institution_longue_pers' => $this->__get('institution_longue_pers'),
               'adr_num_pers' => $this->__get('adr_num_pers'),
               'adr_rue_pers' => $this->__get('adr_rue_pers'),
               'adr_cp_pers' => $this->__get('adr_cp_pers'),
               'adr_ville_pers' => $this->__get('adr_ville_pers'),
               'adr_pays_pers' => $this->__get('adr_pays_pers'),
               'code_pers' => $this->__get('code_pers')
             ];

    }



  }


?>
