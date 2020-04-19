<?php

class ReinitialisationManager{
    private $connexion;

    function __construct($db) {
      $this->connexion = $db;
    }

    function verifEmail($email){
        
      $prep = null;
      $result = false;
      try {
        $sql = "SELECT COUNT(1) as answer FROM personne WHERE mail_connexion_pers= :mail";
        $prep = $this->connexion->prepare($sql);
        $prep->bindValue(':mail', $email, PDO::PARAM_STR);
        $prep->execute();
        $result = $prep->fetchAll(PDO::FETCH_ASSOC);
      } catch (PDOException $e) {
        die($e);
      } finally {
        $prep->closeCursor();
        $prep = null;
      }
        return $result[0]['answer'];
    }

    function verifCode($email, $code){
      $prep = null;
    $result = false;
    try {
      $sql = "SELECT COUNT(1) as answer FROM personne WHERE mail_connexion_pers= :mail AND code_reinit_pers = :code";
      $prep = $this->connexion->prepare($sql);
      $prep->bindValue(':mail', $email, PDO::PARAM_STR);
      $prep->bindValue(':code', $code, PDO::PARAM_STR);
      $prep->execute();
      $result = $prep->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      die($e);
    } finally {
      $prep->closeCursor();
      $prep = null;
    }
      return $result[0]['answer'];
  }

    function initCode($email, $code){
        
      $prep = null;
        $result = false;
        try {
          $sql = "UPDATE personne SET code_reinit_pers = :code WHERE mail_connexion_pers= :mail";
          $prep = $this->connexion->prepare($sql);
          $prep->bindValue(':mail', $email, PDO::PARAM_STR);
          $prep->bindValue(':code', $code, PDO::PARAM_STR);
          $prep->execute();
        } catch (PDOException $e) {
          die($e);
        } finally {
          $prep->closeCursor();
          $prep = null;
        }
    }

    function modifierMdp($email, $mdp){
      $prep = null;
        try {
          $sql = "UPDATE personne SET mdp_pers = :mdp WHERE mail_connexion_pers= :mail";
          $prep = $this->connexion->prepare($sql);
          $prep->bindValue(':mail', $email, PDO::PARAM_STR);
          $prep->bindValue(':mdp', $mdp, PDO::PARAM_STR);
          $prep->execute();
        } catch (PDOException $e) {
          die($e);
        } finally {
          $prep->closeCursor();
          $prep = null;
        }
    }
}