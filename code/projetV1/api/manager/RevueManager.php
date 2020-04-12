<?php

  class RevueManager {
    private $connexion;

    function __construct($db) {
      $this->connexion = $db;
    }

    function get($idRevue) {
      $prep = null;
      $revue = null;

      try {
        $sql = "SELECT * FROM revue WHERE `id`=idRevue VALUES(:idRevue)";
        $prep = $this->connexion->prepare($sql);
        $prep->bindValue(':idRevue', $idRevue, PDO::PARAM_INT);
        $result = $prep->fetch(PDO::FETCH_ASSOC);

        $revue = new Revue($result);

      } catch (PDOException $e) {
        die($e);
      } finally {
        $prep->closeCursor();
        $prep = null;
      }

      return $revue;

    }

    function getAll() {
      $prep = null;
      $revue = null;
      $revues = array();

      try {
        $sql = "SELECT * FROM revue";
        $prep = $this->connexion->prepare($sql);
        $result = $prep->fetchAll(PDO::FETCH_ASSOC);

        foreach ($result as $revueDB) {
          $revue = new Revue($revueDB);
          array_push($revues, $revue);
        }

      } catch (PDOException $e) {
        die($e);
      } finally {
        $prep->closeCursor();
        $prep = null;
      }

      return $revues;

    }

    function total() {
      return $this->connexion->query('SELECT COUNT(*) FROM revue')->fetchColumn();
    }

    function ajouter($numero, $isSpecial) {
      $prep = null;
      $revue = null;

      // vérifie si elle n'existe pas déjà
      $sql = "SELECT * FROM revue WHERE `numero`=numeroRevue VALUES(:numeroRevue)";
      $prep = $this->connexion->prepare($sql);
      $prep->bindValue(':numeroRevue', $numero, PDO::PARAM_INT);
      $result = $prep->fetchAll(PDO::FETCH_ASSOC);

      if (!$result) {
        try {
          $sql = "INSERT * FROM revue(id, numero, specialHELHa) VALUES(null, :numero, :specialHELHa)";
          $prep = $this->connexion->prepare($sql);
          $prep->bindValue(':numero', $numero, PDO::PARAM_INT);
          $prep->bindValue(':specialHELHa', $isSpecial, PDO::PARAM_BOOL);
          $result = $prep->execute();

        } catch (PDOException $e) {
          die($e);
        } finally {
          $prep->closeCursor();
          $prep = null;
        }
      } else $result = false;

      return $result;

    }

    function modifier($revue) {
      $prep = null;
      $result = null;
      $revue = null;

      try {
        $sql = "UPDATE * FROM revue SET(numero, specialHELHa) VALUES(:numero, :specialHELHa) WHERE `id`=idRevue VALUES(:id)";
        $prep = $this->connexion->prepare($sql);
        $prep->bindValue(':id', $idRevue, PDO::PARAM_INT);
        $prep->bindValue(':numero', $numero, PDO::PARAM_INT);
        $prep->bindValue(':specialHELHa', $isSpecial, PDO::PARAM_BOOL);
        $result = $prep->execute();

      } catch (PDOException $e) {
        die($e);
      } finally {
        $prep->closeCursor();
        $prep = null;
      }

      return $result;

    }

    function supprimer($idRevue) {
      $prep = null;
      $result = null;

      try {
        $sql = "DELETE FROM revue WHERE `id`=idRevue VALUES(:idRevue)";
        $prep = $this->connexion->prepare($sql);
        $prep->bindValue(':idRevue', $idRevue, PDO::PARAM_INT);
        $result = $prep->execute();

      } catch (PDOException $e) {
        die($e);
      } finally {
        $prep->closeCursor();
        $prep = null;
      }

      return $result;
    }

  }

?>
