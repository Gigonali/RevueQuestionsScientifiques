<?php
  // Sujet à modification
  class DBManager {

    private $db;

    function connect() {
      try {
        $strConnection = 'mysql:host=localhost;dbname=rqs';
        $this->db = new PDO($strConnection, 'root', '');
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      } catch (PDOException $e) {
        $msg = 'ERREUR PDO dans ' . $e->getFile() . ' Ligne : ' . $e->getLine() . ' : ' . $e->getMessage();
        die($msg);

      }

      return $this->db;
    }

    function disconnect() {
      $this->db = null;

    }

  }

?>
