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
        $sql = "SELECT * FROM revue WHERE `id_rev`=:idRevue";
        $prep = $this->connexion->prepare($sql);
        $prep->bindValue(':idRevue', $idRevue, PDO::PARAM_INT);
        $prep->execute();
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
        $sql = "SELECT * FROM revue ORDER BY numero_rev";
        $prep = $this->connexion->prepare($sql);
        $prep->execute();
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

    function ajouter($revue) {
      $prep = null;

      // vérifie si elle n'existe pas déjà
      $sql = "SELECT * FROM revue WHERE `numero_rev`=:numeroRevue";
      $prep = $this->connexion->prepare($sql);
      $prep->bindValue(':numeroRevue', $revue->__get('numero_rev'), PDO::PARAM_INT);
      $prep->execute();
      $result = $prep->fetchAll(PDO::FETCH_ASSOC);

      if (!$result) {
        try {
          $sql = "INSERT INTO `revue`(`id_rev`, `numero_rev`, `special_helha_rev`) VALUES (NULL, :numero, :specialHELHa)";
          $prep = $this->connexion->prepare($sql);
          $prep->bindValue(':numero', $revue->__get('numero_rev'), PDO::PARAM_INT);
          $prep->bindValue(':specialHELHa', $revue->__get('special_helha_rev'), PDO::PARAM_BOOL);
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

      try {
        $sql = "UPDATE revue SET `numero_rev`=:numero, `special_helha_rev`=:specialHELHa WHERE `id_rev`=:idRevue";
        $prep = $this->connexion->prepare($sql);
        $prep->bindValue(':idRevue', $revue->__get('id_rev'), PDO::PARAM_INT);
        $prep->bindValue(':numero', $revue->__get('numero_rev'), PDO::PARAM_INT);
        $prep->bindValue(':specialHELHa', $revue->__get('special_helha_rev'), PDO::PARAM_BOOL);
        $result = $prep->execute();

      } catch (PDOException $e) {
        die($e);
      } finally {
        $prep->closeCursor();
        $prep = null;
      }

      return $result;

    }

    function supprimer($id_revRevue) {
      $prep = null;
      $result = null;

      try {
        $sql = "DELETE FROM revue WHERE `id_rev`=:idRevue";
        $prep = $this->connexion->prepare($sql);
        $prep->bindValue(':idRevue', $id_revRevue, PDO::PARAM_INT);
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
