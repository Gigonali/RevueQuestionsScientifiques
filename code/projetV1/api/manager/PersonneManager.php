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
        $personne->__set('mdp_pers', '');
        $personne->__set('code_reinit_pers', '');

      } catch (PDOException $e) {
        die($e);
      } finally {
        $prep->closeCursor();
        $prep = null;
      }

      return $personne;

    }

    function getAll($filter) {
      $prep = null;
      $personne = null;
      $personnes = array();

      try {
        $sql = $this->getFilteredSql($filter);
        $prep = $this->connexion->prepare($sql);
        $prep->execute();
        $result = $prep->fetchAll(PDO::FETCH_ASSOC);

        foreach ($result as $personneDB) {
          $personne = new Personne($personneDB);
          $personne->__set('mdp_pers', '');
          $personne->__set('code_reinit_pers', '');
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
          $sql = "INSERT INTO `personne` (`id_pers`, `nom_pers`, `prenom_pers`,
                 `mail_contact_pers`, `mail_connexion_pers`, `mdp_pers`, `commentaire_pers`,
                 `estRecenseur_pers`, `estContact_pers`, `institution_courte_pers`, `institution_longue_pers`,
                 `adr_num_pers`, `adr_rue_pers`, `adr_cp_pers`, `adr_ville_pers`, `adr_pays_pers`, `code_reinit_pers`)
                 VALUES (NULL, :nom, :prenom, :mailContact, :mailConnexion, NULL, :commentaire, :estRecenseur,
                 :estContact, :institutionCourte, :institutionLongue, :adrNum, :adrRue, :adrCp, :adrVille,
                 :adrPays, '')";
          $prep = $this->connexion->prepare($sql);
          $prep->bindValue(':nom', $personne->__get('nom_pers'), PDO::PARAM_STR);
          $prep->bindValue(':prenom', $personne->__get('prenom_pers'), PDO::PARAM_STR);
          $prep->bindValue(':mailContact', $personne->__get('mail_contact_pers'), PDO::PARAM_STR);
          $prep->bindValue(':mailConnexion', $personne->__get('mail_connexion_pers'), PDO::PARAM_STR);
          $prep->bindValue(':commentaire', $personne->__get('commentaire_pers'), PDO::PARAM_STR);
          $prep->bindValue(':estRecenseur', $personne->__get('estRecenseur_pers'), PDO::PARAM_STR);
          $prep->bindValue(':estContact', $personne->__get('estContact_pers'), PDO::PARAM_STR);
          $prep->bindValue(':institutionCourte', $personne->__get('institution_courte_pers'), PDO::PARAM_STR);
          $prep->bindValue(':institutionLongue', $personne->__get('institution_longue_pers'), PDO::PARAM_STR);
          $prep->bindValue(':adrNum', $personne->__get('adr_num_pers'), PDO::PARAM_STR);
          $prep->bindValue(':adrRue', $personne->__get('adr_rue_pers'), PDO::PARAM_STR);
          $prep->bindValue(':adrCp', $personne->__get('adr_cp_pers'), PDO::PARAM_STR);
          $prep->bindValue(':adrVille', $personne->__get('adr_ville_pers'), PDO::PARAM_STR);
          $prep->bindValue(':adrPays', $personne->__get('adr_pays_pers'), PDO::PARAM_STR);
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
        $sql = "UPDATE personne SET `nom_pers`=:nom, `prenom_pers`=:prenom,
                       `mail_contact_pers`=:mailContact, `mail_connexion_pers`=:mailConnexion,
                       `commentaire_pers`=:commentaire,
                       `estRecenseur_pers`=:estRecenseur, `estContact_pers`=:estContact,
                       `institution_courte_pers`=:institutionCourte,
                       `institution_longue_pers`=:institutionLongue, `adr_num_pers`=:adrNum,
                       `adr_rue_pers`=:adrRue, `adr_cp_pers`=:adrCp, `adr_ville_pers`=:adrVille,
                       `adr_pays_pers`=:adrPays WHERE `id_pers`=:id";
        $prep = $this->connexion->prepare($sql);
        $prep->bindValue(':id', $personne->__get('id_pers'), PDO::PARAM_INT);
        $prep->bindValue(':nom', $personne->__get('nom_pers'), PDO::PARAM_STR);
        $prep->bindValue(':prenom', $personne->__get('prenom_pers'), PDO::PARAM_STR);
        $prep->bindValue(':mailContact', $personne->__get('mail_contact_pers'), PDO::PARAM_STR);
        $prep->bindValue(':mailConnexion', $personne->__get('mail_connexion_pers'), PDO::PARAM_STR);
        $prep->bindValue(':commentaire', $personne->__get('commentaire_pers'), PDO::PARAM_STR);
        $prep->bindValue(':estRecenseur', $personne->__get('estRecenseur_pers'), PDO::PARAM_INT);
        $prep->bindValue(':estContact', $personne->__get('estContact_pers'), PDO::PARAM_INT);
        $prep->bindValue(':institutionCourte', $personne->__get('institution_courte_pers'), PDO::PARAM_STR);
        $prep->bindValue(':institutionLongue', $personne->__get('institution_longue_pers'), PDO::PARAM_STR);
        $prep->bindValue(':adrNum', $personne->__get('adr_num_pers'), PDO::PARAM_STR);
        $prep->bindValue(':adrRue', $personne->__get('adr_rue_pers'), PDO::PARAM_STR);
        $prep->bindValue(':adrCp', $personne->__get('adr_cp_pers'), PDO::PARAM_STR);
        $prep->bindValue(':adrVille', $personne->__get('adr_ville_pers'), PDO::PARAM_STR);
        $prep->bindValue(':adrPays', $personne->__get('adr_pays_pers'), PDO::PARAM_STR);
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

    function getFilteredSql($filter) {
      switch ($filter) {
        case 'toutes': return "SELECT * FROM personne";
        case 'auteurs': return "SELECT * FROM personne INNER JOIN auteur ON personne.id_pers = auteur.id_pers";
        case 'recenseurs': return "SELECT * FROM personne WHERE estRecenseur_pers=1";
        case 'experts': return "SELECT * FROM personne INNER JOIN expert ON personne.id_pers = expert.id_pers";
        case 'divers': return "SELECT * FROM personne WHERE estContact_pers=1";
        default: return "SELECT * FROM personne";
      }
    }

  }

?>
