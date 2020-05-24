<?php

class AuthentificationManager{
  private $connexion;

    function __construct($db) {
      $this->connexion = $db;
    }

    function connecter($mailCo,$hashMdp){
      $prep = null;
      $result = false;
      try {
        $sql = "SELECT COUNT(1) as answer, id_pers as id, mdp_pers as hashMdp FROM personne WHERE mail_connexion_pers= :mail";
        $prep = $this->connexion->prepare($sql);
        $prep->bindValue(':mail', $mailCo, PDO::PARAM_STR);
        $prep->execute();
        $result = $prep->fetchAll(PDO::FETCH_ASSOC);
      } catch (PDOException $e) {
        die($e);
      } finally {
        $prep->closeCursor();
        $prep = null;
      }
      print_r($result);
      if ($result[0]["answer"]) {
        return $result[0]; //FOUND
      } else {
        return $result[0]["answer"]; //NOT FOUND
      }
    }

    /* function connecter($mailCo, $mdp) {
      $prep = null;
      $result = null;
      $identifiants[] = null;
      $perms = null;

      try {
        // tentative récupération d'une personne par email
        $sql = "SELECT COUNT(1) as isCorrespondance, id_pers as id, mail_connexion_pers as mail, mdp_pers as hashMdp
                FROM personne WHERE mail_connexion_pers=:mail";
        $prep = $this->connexion->prepare($sql);
        $prep->bindValue(':mail', $mailCo, PDO::PARAM_STR);
        $prep->execute();
        $result = $prep->fetchAll(PDO::FETCH_ASSOC);
        $result = $result[0];

        if ($result['isCorrespondance'] == 1) {
          if (isset($result['hashMdp']) && !empty($result['hashMdp'])) {
            $identifiants['isCorrect'] = password_verify($mdp, $result['hashMdp']);
            var_dump($identifiants);
            if ($identifiants['isCorrect']) {
              $identifiants['id'] = $result['id'];
              $identifiants['mail'] = $result['mail'];

              $perms = $this->getPermission($identifiants['id']);
              !isset($perms) ? $perms === 'ADMINISTRATEUR' ? 2 : 1 : 3;

            }
          }
        }

      } catch (PDOException $e) {
        die($e);

      } finally {
        $prep->closeCursor();
        $prep = null;
      }

      return $identifiants;
    } */

    function isAuteur($id){
      $prep = null;
      $result = false;
      try {
        $sql = "SELECT COUNT(1) as answer FROM auteur WHERE id_pers= :id";
        $prep = $this->connexion->prepare($sql);
        $prep->bindValue(':id', $id, PDO::PARAM_INT);
        $prep->execute();
        $result = $prep->fetchAll(PDO::FETCH_ASSOC);
      } catch (PDOException $e) {
        die($e);
      } finally {
        $prep->closeCursor();
        $prep = null;
      }
      if($result[0]["answer"]==1){
        return true;
      }else{
        return false;
      }

    }

    function getPermission($id){
      $prep = null;
      $result = false;
      try {
        $sql = "SELECT permission.libelle_perm as perm FROM a INNER JOIN administration ON a.id_pers = administration.id_pers INNER JOIN permission ON a.id_perm = permission.id_perm WHERE administration.id_pers = :id";
        $prep = $this->connexion->prepare($sql);
        $prep->bindValue(':id', $id, PDO::PARAM_INT);
        $prep->execute();
        $result = $prep->fetchAll(PDO::FETCH_ASSOC);
      } catch (PDOException $e) {
        die($e);
      } finally {
        $prep->closeCursor();
        $prep = null;
      }
      return $result[0]["perm"];

    }
}
