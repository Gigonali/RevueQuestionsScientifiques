<?php

  class PersonneManager {
    private $connexion;

    function __construct($db) {
      $this->connexion = $db;
    }

    function get($idPersonne) {
      $prep = null;
      $personne = null;

      try {
        $sql = "SELECT * FROM personne WHERE `id_pers`=:idPers";
        $prep = $this->connexion->prepare($sql);
        $prep->bindValue(':idPers', $idPersonne, PDO::PARAM_INT);
        $prep->execute();
        $result = $prep->fetch(PDO::FETCH_ASSOC);

        $personne = new Personne($result);

      } catch (PDOException $e) {
        die($e);
      } finally {
        $prep->closeCursor();
        $prep = null;
      }

      return $personne;

    }

    function getAll() {
      $prep = null;
      $personne = null;
      $personnes = array();

      try {
        $sql = "SELECT * FROM personne ";
        $prep = $this->connexion->prepare($sql);
        $prep->execute();
        $result = $prep->fetchAll(PDO::FETCH_ASSOC);

        foreach ($result as $personneDB) {
          $personne = new Personne($personneDB);


          array_push($personnes, $personne);
        }

      } catch (PDOException $e) {
        die($e);
      } finally {
        $prep->closeCursor();
        $prep = null;
      }

      return $personnes;

    }

    function total() {
      return $this->connexion->query('SELECT COUNT(*) FROM personne')->fetchColumn();
    }

    function ajouter($personne) {
      $prep = null;

      // vérifie si elle n'existe pas déjà
      $sql = "SELECT * FROM personne WHERE `id_pers`=:id";
      $prep = $this->connexion->prepare($sql);
      $prep->bindValue(':id', $personne->__get('id'), PDO::PARAM_STR);
      $prep->execute();
      $result = $prep->fetchAll(PDO::FETCH_ASSOC);

      if (!$result) {
        try {
          $sql = "INSERT INTO `personne` (`id_pers`, `nom_pers`, `prenom_pers`, `mail_contact_pers`, `mail_connexion_pers`, `mdp_pers`, `commentaire_pers`, `estRecenseur_pers`, `estContact_pers`, `institution_courte_pers`, `institution_longue_pers`, `adr_adr_numero`, `adr_adr_rue`, `adr_adr_cp`, `adr_adr_ville`, `adr_adr_pays`, `code_reinit_pers`)
           VALUES (NULL, 'nom', 'prenom', 'mailContact', 'mailConnexion', 'mdp', 'commentaire', 'estRescenseur', 'estContact', 'institutionCourte', 'institutionLongue', 'adrNum', 'adrRue', 'adrCp', 'adrVille', 'adrPays', 'code')";
          $prep = $this->connexion->prepare($sql);
          $prep->bindValue(':nom', $personne->__get('nom'), PDO::PARAM_STR);
          $prep->bindValue(':prenom', $personne->__get('prenom'), PDO::PARAM_STR);
          $prep->bindValue(':mailContact', $personne->__get('mailContact'), PDO::PARAM_STR);
          $prep->bindValue(':mailConnexion', $personne->__get('mailConnexion'), PDO::PARAM_STR);
          $prep->bindValue(':mdp', $personne->__get('mdp'), PDO::PARAM_STR);
          $prep->bindValue(':commentaire', $personne->__get('commentaire'), PDO::PARAM_STR);
          $prep->bindValue(':estRescenseur', $personne->__get('estRescenseur'), PDO::PARAM_STR);
          $prep->bindValue(':estContact', $personne->__get('estContact'), PDO::PARAM_STR);
          $prep->bindValue(':institutionCourte', $personne->__get('institutionCourte'), PDO::PARAM_STR);
          $prep->bindValue(':institutionLongue', $personne->__get('institutionLongue'), PDO::PARAM_STR);
          $prep->bindValue(':adrNum', $personne->__get('adrNum'), PDO::PARAM_STR);
          $prep->bindValue(':adrRue', $personne->__get('adrRue'), PDO::PARAM_STR);
          $prep->bindValue(':adrCp', $personne->__get('adrCp'), PDO::PARAM_STR);
          $prep->bindValue(':adrVille', $personne->__get('adrVille'), PDO::PARAM_STR);
          $prep->bindValue(':adrPays', $personne->__get('adrPays'), PDO::PARAM_STR);
          $prep->bindValue(':code', $personne->__get('code'), PDO::PARAM_STR);
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

    function modifier($personne) {
      $prep = null;
      $result = null;

      try {
        $sql = "UPDATE `personne` SET `nom_pers` = ':nom', `prenom_pers` = ':prenom', `mail_contact_pers` = ':mailContact', `mail_connexion_pers` = 'mailConnexion', `mdp_pers` = ':mdp', `commentaire_pers` = ':commentaire', `estRecenseur_pers` = ':estRescenseur', `estContact_pers` = ':estContact', `institution_courte_pers` = ':institutionCourte, `institution_longue_pers` = ':institutionLongue', `adr_adr_numero` = ':adrNum', `adr_adr_rue` = ':adrRue', `adr_adr_cp` = ':adrCp', `adr_adr_ville` = ':adrVille', `adr_adr_pays` = ':adrPays', `code_reinit_pers` = ':code' WHERE `personne`.`id_pers` = ':id'";
        $prep = $this->connexion->prepare($sql);
          $prep->bindValue(':id', $personne->__get('id'), PDO::PARAM_INT);
          $prep->bindValue(':nom', $personne->__get('nom'), PDO::PARAM_STR);
          $prep->bindValue(':prenom', $personne->__get('prenom'), PDO::PARAM_STR);
          $prep->bindValue(':mailContact', $personne->__get('mailContact'), PDO::PARAM_STR);
          $prep->bindValue(':mailConnexion', $personne->__get('mailConnexion'), PDO::PARAM_STR);
          $prep->bindValue(':mdp', $personne->__get('mdp'), PDO::PARAM_STR);
          $prep->bindValue(':commentaire', $personne->__get('commentaire'), PDO::PARAM_STR);
          $prep->bindValue(':estRescenseur', $personne->__get('estRescenseur'), PDO::PARAM_STR);
          $prep->bindValue(':estContact', $personne->__get('estContact'), PDO::PARAM_STR);
          $prep->bindValue(':institutionCourte', $personne->__get('institutionCourte'), PDO::PARAM_STR);
          $prep->bindValue(':institutionLongue', $personne->__get('institutionLongue'), PDO::PARAM_STR);
          $prep->bindValue(':adrNum', $personne->__get('adrNum'), PDO::PARAM_STR);
          $prep->bindValue(':adrRue', $personne->__get('adrRue'), PDO::PARAM_STR);
          $prep->bindValue(':adrCp', $personne->__get('adrCp'), PDO::PARAM_STR);
          $prep->bindValue(':adrVille', $personne->__get('adrVille'), PDO::PARAM_STR);
          $prep->bindValue(':adrPays', $personne->__get('adrPays'), PDO::PARAM_STR);
          $prep->bindValue(':code', $personne->__get('code'), PDO::PARAM_STR);
          $result = $prep->execute();

      } catch (PDOException $e) {
        die($e);
      } finally {
        $prep->closeCursor();
        $prep = null;
      }

      return $result;

    }

    function supprimer($id_personne) {
      $prep = null;
      $result = null;

      try {
        $sql = "DELETE FROM personne WHERE `id_pers`=:idPersonne";
        $prep = $this->connexion->prepare($sql);
        $prep->bindValue(':idPersonne', $id_personne, PDO::PARAM_INT);
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
