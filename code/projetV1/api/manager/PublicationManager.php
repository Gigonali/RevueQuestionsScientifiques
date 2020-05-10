<?php

  class   PublicationManager {
    private $connexion;

    function __construct($db) {
      $this->connexion = $db;
    }

    function get($idPublication) {
      $prep = null;
      $publication = null;

      try {
        $sql = "SELECT * FROM publication WHERE `id_pub`=:idPub";
        $prep = $this->connexion->prepare($sql);
        $prep->bindValue(':idPub', $idPublication, PDO::PARAM_INT);
        $prep->execute();
        $result = $prep->fetch(PDO::FETCH_ASSOC);

        $revue = new Publication($result);

      } catch (PDOException $e) {
        die($e);
      } finally {
        $prep->closeCursor();
        $prep = null;
      }

      return $publication;

    }

    function getAll() {
      $prep = null;
      $revue = null;
      $revues = array();

      try {
        $sql = "SELECT * FROM publication";
        $prep = $this->connexion->prepare($sql);
        $prep->execute();
        $result = $prep->fetchAll(PDO::FETCH_ASSOC);

        foreach ($result as $publicationDB) {
          $revue = new Revue($publicationDB);
          array_push($publications, $publication);
        }

      } catch (PDOException $e) {
        die($e);
      } finally {
        $prep->closeCursor();
        $prep = null;
      }

      return $publication;

    }

    function getAllType($id) {
      $prep = null;
      $publication = null;
      $publications = array();

      try {
        $sql = "SELECT * FROM publication WHERE `id_type`=`:id_type`";
        $prep = $this->connexion->prepare($sql);
        $prep->bindValue(':id_type', $id, PDO::PARAM_INT);
        $prep->execute();
        $result = $prep->fetchAll(PDO::FETCH_ASSOC);

        foreach ($result as $publicationDB) {
          $publication = new Publication($publicationDB);
          array_push($publications, $publication);
        }

      } catch (PDOException $e) {
        die($e);
      } finally {
        $prep->closeCursor();
        $prep = null;
      }

      return $publication;

    }

    function total() {
      return $this->connexion->query('SELECT COUNT(*) FROM publication')->fetchColumn();
    }

    function ajouter($publication) {
      $prep = null;

      // vérifie si elle n'existe pas déjà
      $sql = "SELECT * FROM publication WHERE `titre_pub`=:titrePub";
      $prep = $this->connexion->prepare($sql);
      $prep->bindValue(':titrePub', $publication->__get('id_pub'), PDO::PARAM_INT);
      $prep->execute();
      $result = $prep->fetchAll(PDO::FETCH_ASSOC);

      if (!$result) {
        try {
          $sql = "INSERT INTO `publication` (`id_pub`, `titre_pub`, `resume_pub`, `lieu_pub`, `date_pub`, `plagiat_pub`, `id_pub_ref`, `id_etat_pub`, `id_type`, `id_rev`)
          VALUES (NULL, ':id_pub', ':titre_pub', ':resume_pub', ':lieux_pub', ':plagiat_pub', ':id_pub_ref', ':id_etat', ':id_type', ':id_rev');";
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


    function supprimer($id) {
      $prep = null;
      $result = null;

      try {
        $sql = "DELETE FROM publication WHERE `id_pub`=:idPub";
        $prep = $this->connexion->prepare($sql);
        $prep->bindValue(':idPub', $id, PDO::PARAM_INT);
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
