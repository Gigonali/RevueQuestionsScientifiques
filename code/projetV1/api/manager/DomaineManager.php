<?php

class DomaineManager
{

  private $connexion;

  function __construct($db)
  {
    $this->connexion = $db;
  }

  function get($idDomaine) {
    $prep = null;
    $domaine = null;

    try {
      $sql = "SELECT * FROM domaine WHERE `id_dom`=:idDomaine";

      $prep = $this->connexion->prepare($sql);
      $prep->bindValue(':idDomaine', $idDomaine, PDO::PARAM_INT);
      $prep->execute();
      $result = $prep->fetch(PDO::FETCH_ASSOC);

      $domaine = new Domaine();
      $domaine->__set('id',$result['id_dom']);
      $domaine->__set('libelle',$result['libelle_dom']);

    } catch (PDOException $e) {
      die($e);
    } finally {
      $prep->closeCursor();
      $prep = null;
    }

    return $domaine;

  }

  function getAll() {
    $prep = null;
    $domaine = null;
    $domaines = array();
    try {
      $sql = "SELECT * FROM domaine" ;
      $prep = $this->connexion->prepare($sql);
      $prep->execute();
      $result = $prep->fetchAll(PDO::FETCH_ASSOC);

      foreach ($result as $domaineDB) {

        $domaine = new Domaine();
        $domaine->__set('id',$domaineDB['id_dom']);
        $domaine->__set('libelle',$domaineDB['libelle_dom']);
        array_push($domaines, $domaine);

      }
    } catch (PDOException $e) {
      die($e);
    } finally {
      $prep->closeCursor();
      $prep = null;
    }

    return $domaines;

  }

  function total() {
    return $this->connexion->query('SELECT COUNT(*) FROM domaine')->fetchColumn();
  }

  /**
   * ajouter
   */
  function ajouter($domaine) {
    $prep = null;

    // vérifie si elle n'existe pas déjà
    $sql = "SELECT * FROM domaine WHERE `id_dom`=:idDomaine";
    $prep = $this->connexion->prepare($sql);
    $prep->bindValue(':idDomaine', $domaine->__get('id'), PDO::PARAM_INT);
    $prep->execute();
    $result = $prep->fetchAll(PDO::FETCH_ASSOC);

    if (!$result) {
      try {
        $sql = "INSERT INTO `domaine`(`libelle_dom`) VALUES (:libelleDom)";
        $prep = $this->connexion->prepare($sql);
        $prep->bindValue(':libelleDom', $domaine->__get('libelle'), PDO::PARAM_STR);
        print_r($domaine);

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
  /**
   * supprimer
   */
  function supprimer($id)
  {
    $prep = null;
    try {
      $sql = "DELETE FROM domaine WHERE `id_dom`=:id";
      $prep = $this->connexion->prepare($sql);
      $prep->bindValue(':id', $id, PDO::PARAM_INT);
      $prep->execute();
    } catch (PDOException $e) {
      die($e);
    } finally {
      $prep->closeCursor();
      $prep = null;
    }
  }
   /**
   * modifier
   */
  function modifier($domaine)
  {
    $prep = null;
    try {
      $sql = "UPDATE domaine SET `libelle_dom`=:libelle WHERE `id_dom`=:idDomaine";
      $prep = $this->connexion->prepare($sql);
      $prep->bindValue(':idDomaine', $domaine->__get('id'), PDO::PARAM_INT);
      $prep->bindValue(':libelle', $domaine->__get('libelle'), PDO::PARAM_STR);
      $result=$prep->execute();
    } catch (PDOException $e) {
      die($e);
    } finally {
      $prep->closeCursor();
      $prep = null;
    }
    return $result;
  }
}
