<?php

class MaisonEditionManager {
    private $connexion;

    public function __construct($db) {
      $this->connexion = $db;
    }

    public function get($id) {
      try {
        $sql = "SELECT * FROM maison_edition WHERE id_mai = :id";

        $q = $this->connexion->prepare($sql);
        $q->bindValue(':id', $id, PDO::PARAM_INT);

        $data = $q->execute()->fetch(PDO::FETCH_ASSOC);
      } catch (PDOException $e) {
        die($e);
      } finally {
        $q->closeCursor();
      }
      return new MaisonEdition($data);
    }

    public function getAll() {
      try {
        $sql = "SELECT * FROM maison_edition";

        $q = $this->connexion->query($sql);
        $liste = array();
        while($data = $q->fetch(PDO::FETCH_ASSOC)) {
          array_push($liste, new MaisonEdition($data));
        }
      } catch (PDOException $e) {
        die($e);
      } finally {
        $q->closeCursor();
      }
      return $liste;
    }

    public function ajouter(MaisonEdition $me) {
      try {
        $sql = "INSERT INTO maison_edition(id_mai, nom_mai, nom_classement_mai, nom_correspondant_mai, mail_correspondant_mai,
                adr_adr_numero, adr_adr_rue, adr_adr_cp, adr_adr_ville, adr_adr_pays)
                VALUES(NULL, :nom, :nomClassement, :nomCorrespondant, :mailCorrespondant, :adrNumero, :adrRue, :adrCp, :adrVille,
                :adrPays)";

        $q = $this->connexion->prepare($sql);
        $q->bindValue(':nom', $me->nom, PDO::PARAM_STR);
        $q->bindValue(':nomClassement', $me->nomClassement, PDO::PARAM_STR);
        $q->bindValue(':nomCorrespondant', $me->nomCorrespondant, PDO::PARAM_STR);
        $q->bindValue(':mailCorrespondant', $me->mailCorrespondant, PDO::PARAM_STR);
        $q->bindValue(':adrNumero', $me->adrNumero, PDO::PARAM_STR);
        $q->bindValue(':adrRue', $me->adrRue, PDO::PARAM_STR);
        $q->bindValue(':adrCp', $me->adrCp, PDO::PARAM_STR);
        $q->bindValue(':adrVille', $me->adrVille, PDO::PARAM_STR);
        $q->bindValue(':adrPays', $me->adrPays, PDO::PARAM_STR);

        $resultat = $q->execute();
      } catch (PDOException $e) {
        die($e);
      } finally {
        $q->closeCursor();
      }
      return $resultat;
    }

    public function modifier(MaisonEdition $me) {
      try {
        $sql = "UPDATE maison_edition SET nom_mai = :nom, nom_classement_mai = :nomClassement,
                nom_correspondant_mai = :nomCorrespondant, mail_correspondant_mai = :mailCorrespondant,
                adr_adr_numero = :adrNumero, adr_adr_rue = :adrRue, adr_adr_cp = :adrCp, adr_adr_ville = :adrVille,
                adr_adr_pays = :adrPays WHERE id_mai = :id";

        $q = $this->connexion->prepare($sql);
        $q->bindValue(':nom', $me->nom, PDO::PARAM_STR);
        $q->bindValue(':nomClassement', $me->nomClassement, PDO::PARAM_STR);
        $q->bindValue(':nomCorrespondant', $me->nomCorrespondant, PDO::PARAM_STR);
        $q->bindValue(':mailCorrespondant', $me->mailCorrespondant, PDO::PARAM_STR);
        $q->bindValue(':adrNumero', $me->adrNumero, PDO::PARAM_STR);
        $q->bindValue(':adrRue', $me->adrRue, PDO::PARAM_STR);
        $q->bindValue(':adrCp', $me->adrCp, PDO::PARAM_STR);
        $q->bindValue(':adrVille', $me->adrVille, PDO::PARAM_STR);
        $q->bindValue(':adrPays', $me->adrPays, PDO::PARAM_STR);
        $q->bindValue(':id', $me->id, PDO::PARAM_INT);

        $resultat = $q->execute();
      } catch (PDOException $e) {
        die($e);
      } finally {
        $q->closeCursor();
      }
      return $resultat;
    }

    public function supprimer($id) {
      try {
        $sql = "DELETE FROM maison_edition WHERE id_mai = :id";
        $q = $this->connexion->prepare($sql);
        $q->bindValue(':id', $id, PDO::PARAM_INT);

        $resultat = $q->execute();
      } catch (PDOException $e) {
        die($e);
      } finally {
        $q->closeCursor();
      }
      return $resultat;
    }

    public function total() {
      return $this->connexion->query('SELECT COUNT(*) FROM maison_edition')->fetchColumn();
    }
}
