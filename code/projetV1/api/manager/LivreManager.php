<?php

class LivreManager {
    private $connexion;

    public function __construct($db) {
      $this->connexion = $db;
    }

    public function get($id) {
      try {
        $sql = "SELECT * FROM livre WHERE id_liv = :id";

        $q = $this->db->prepare($sql);
        $q->bindValue(':id', $id, PDO::PARAM_INT);

        $data = $q->execute()->fetch(PDO::FETCH_ASSOC);
      } catch (PDOException $e) {
        die($e);
      } finally {
        $q->closeCursor();
      }
      return new Livre($data);
    }

    public function getAll() {
      try {
        $sql = "SELECT * FROM livre";

        $q = $this->db->query($sql);

        $liste = array();
        while($data = $q->fetch(PDO::FETCH_ASSOC)) {
          array_push($liste, new Livre($data));
        }
      } catch (PDOException $e) {
        die($e);
      } finally {
        $q->closeCursor();
      }
      return $liste;
    }

    public function ajouter(Livre $l) {
      try {
        $sql = "INSERT INTO livre(id_liv, isbn_liv, isbn_numerique_liv, nom_auteur_liv, prenom_auteur_liv, titre_liv,
                annee_liv, collection_liv, pages_liv, prix_liv, brochure_liv, responsabilite_edition_liv,
                responsabilite_traduction_liv, id_etat_livre)
                VALUES(NULL, :isbn, :isbnNumerique, :nomAuteur, :prenomAuteur, :titre, :annee, :collection, :pages, :prix,
                :brochure, :respEdition, :respTraduction, :idEtatLivre)";

        $q = $this->connexion->prepare($sql);
        $q->bindValue(':isbn', $l->nom, PDO::PARAM_STR);
        $q->bindValue(':isbnNumerique', $l->nomClassement, PDO::PARAM_STR);
        $q->bindValue(':nomAuteur', $l->nomCorrespondant, PDO::PARAM_STR);
        $q->bindValue(':prenomAuteur', $l->mailCorrespondant, PDO::PARAM_STR);
        $q->bindValue(':titre', $l->nom, PDO::PARAM_STR);
        $q->bindValue(':annee', $l->nomClassement, PDO::PARAM_STR);
        $q->bindValue(':collection', $l->nomCorrespondant, PDO::PARAM_STR);
        $q->bindValue(':pages', $l->mailCorrespondant, PDO::PARAM_INT);
        $q->bindValue(':prix', $l->nomClassement, PDO::PARAM_str);
        $q->bindValue(':brochure', $l->nomCorrespondant, PDO::PARAM_STR);
        $q->bindValue(':respEdition', $l->mailCorrespondant, PDO::PARAM_STR);
        $q->bindValue(':respTraduction', $l->nomCorrespondant, PDO::PARAM_STR);
        $q->bindValue(':idEtatLivre', $l->mailCorrespondant, PDO::PARAM_INT);

        $resultat = $q->execute();
      } catch (PDOException $e) {
        die($e);
      } finally {
        $q->closeCursor();
      }
      return $resultat;
    }

    public function modifier(Livre $l) {
      try {
        $sql = "UPDATE livre SET isbn_liv = :isbn, isbn_numerique_liv = :isbnNumerique, nom_auteur_liv = :nomAuteur,
        prenom_auteur_liv = :prenomAuteur, titre_liv = :titre, annee_liv = :annee, collection_liv = :collection,
        pages_liv = :pages, prix_liv = :prix, brochure_liv = :brochure, responsabilite_edition_liv = :respEdition,
        responsabilite_traduction_liv = :respTraduction, id_etat_livre = :idEtatLivre WHERE id_liv = :id";

        $q = $this->connexion->prepare($sql);
        $q->bindValue(':isbn', $l->nom, PDO::PARAM_STR);
        $q->bindValue(':isbnNumerique', $l->nomClassement, PDO::PARAM_STR);
        $q->bindValue(':nomAuteur', $l->nomCorrespondant, PDO::PARAM_STR);
        $q->bindValue(':prenomAuteur', $l->mailCorrespondant, PDO::PARAM_STR);
        $q->bindValue(':titre', $l->nom, PDO::PARAM_STR);
        $q->bindValue(':annee', $l->nomClassement, PDO::PARAM_STR);
        $q->bindValue(':collection', $l->nomCorrespondant, PDO::PARAM_STR);
        $q->bindValue(':pages', $l->mailCorrespondant, PDO::PARAM_INT);
        $q->bindValue(':prix', $l->nomClassement, PDO::PARAM_str);
        $q->bindValue(':brochure', $l->nomCorrespondant, PDO::PARAM_STR);
        $q->bindValue(':respEdition', $l->mailCorrespondant, PDO::PARAM_STR);
        $q->bindValue(':respTraduction', $l->nomCorrespondant, PDO::PARAM_STR);
        $q->bindValue(':idEtatLivre', $l->mailCorrespondant, PDO::PARAM_INT);
        $q->bindValue(':id', $l->id, PDO::PARAM_INT);

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
        $sql = "DELETE FROM livre WHERE id_liv = :id";
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
      return $this->connexion->query('SELECT COUNT(*) FROM livre')->fetchColumn();
    }
}
