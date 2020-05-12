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

        $q = $this->connexion->query($sql);

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
        $sql = "INSERT INTO livre(isbn_liv, isbn_numerique_liv, nom_auteur_liv, prenom_auteur_liv, titre_liv,
                annee_liv, collection_liv, pages_liv, prix_liv, brochure_liv, responsabilite_edition_pub,
                responsabilite_traduction_pub, id_etat_livre)
                VALUES(:isbn, :isbnNumerique, :nomAuteur, :prenomAuteur, :titre, :annee, :collection, :pages, :prix,
                :brochure, :respEdition, :respTraduction, :idEtatLivre)";
        $q = $this->connexion->prepare($sql);
        $q->bindValue(':isbn', $l->isbn, PDO::PARAM_STR);
        $q->bindValue(':isbnNumerique', $l->isbnNumerique, PDO::PARAM_STR);
        $q->bindValue(':nomAuteur', $l->nomAuteur, PDO::PARAM_STR);
        $q->bindValue(':prenomAuteur', $l->prenomAuteur, PDO::PARAM_STR);
        $q->bindValue(':titre', $l->titre, PDO::PARAM_STR);
        $q->bindValue(':annee', $l->annee, PDO::PARAM_STR);
        $q->bindValue(':collection', $l->collection, PDO::PARAM_STR);
        $q->bindValue(':pages', $l->pages, PDO::PARAM_INT);
        $q->bindValue(':prix', $l->prix, PDO::PARAM_STR);
        $q->bindValue(':brochure', $l->brochure, PDO::PARAM_STR);
        $q->bindValue(':respEdition', $l->respEdition, PDO::PARAM_STR);
        $q->bindValue(':respTraduction', $l->respTraduction, PDO::PARAM_STR);
        $q->bindValue(':idEtatLivre', $l->idEtatLivre, PDO::PARAM_INT);

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
        $q->bindValue(':isbn', $l->isbn, PDO::PARAM_STR);
        $q->bindValue(':isbnNumerique', $l->isbnNumerique, PDO::PARAM_STR);
        $q->bindValue(':nomAuteur', $l->nomAuteur, PDO::PARAM_STR);
        $q->bindValue(':prenomAuteur', $l->prenomAuteur, PDO::PARAM_STR);
        $q->bindValue(':titre', $l->titre, PDO::PARAM_STR);
        $q->bindValue(':annee', $l->annee, PDO::PARAM_STR);
        $q->bindValue(':collection', $l->collection, PDO::PARAM_STR);
        $q->bindValue(':pages', $l->pages, PDO::PARAM_INT);
        $q->bindValue(':prix', $l->prix, PDO::PARAM_STR);
        $q->bindValue(':brochure', $l->brochure, PDO::PARAM_STR);
        $q->bindValue(':respEdition', $l->respEdition, PDO::PARAM_STR);
        $q->bindValue(':respTraduction', $l->respTraduction, PDO::PARAM_STR);
        $q->bindValue(':idEtatLivre', $l->idEtatLivre, PDO::PARAM_INT);

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
