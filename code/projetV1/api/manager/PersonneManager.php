<?php

  class PersonneManager {
    private $connexion;

    function __construct($db) {
      $this->connexion = $db;
    }

  }

?>
