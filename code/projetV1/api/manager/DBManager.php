<?php
  // Sujet à modification
  class DBManager {

    private $db;

    function connect() {
      try {
        $strConnection = 'mysql:host=localhost;dbname=rqs;charset=utf8';
        $this->db = new PDO($strConnection, 'root', '1234');
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
