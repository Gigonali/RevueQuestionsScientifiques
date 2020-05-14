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
          $livre = new Livre(null);
          $livre->__set('id',$data['id_liv']);
          $livre->__set('isbn',$data['isbn_liv']);
          $livre->__set('isbnNumerique',$data['isbn_numerique_liv']);
          $livre->__set('nomAuteur',$data['nom_auteur_liv']);
          $livre->__set('prenomAuteur',$data['prenom_auteur_liv']);
          $livre->__set('titre',$data['titre_liv']);
          $livre->__set('annee',$data['annee_liv']);
          $livre->__set('collection',$data['collection_liv']);
          $livre->__set('pages',$data['pages_liv']);
          $livre->__set('prix',$data['prix_liv']);
          $livre->__set('brochure',$data['brochure_liv']);
          $livre->__set('respEdition',$data['responsabilite_edition_pub']);
          $livre->__set('respTraduction',$data['responsabilite_traduction_pub']);
          $livre->__set('idEtatLivre',$data['id_etat_livre']);
          array_push($liste, $livre);
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
        pages_liv = :pages, prix_liv = :prix, brochure_liv = :brochure, responsabilite_edition_pub = :respEdition,
        responsabilite_traduction_pub = :respTraduction, id_etat_livre = :idEtatLivre WHERE id_liv = :id";

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

    public function existe($id,$isbn, $isbnNum){
      try {
        $sql = "SELECT COUNT(1) FROM (SELECT isbn_liv, isbn_numerique_liv from livre WHERE id_liv != :id) as res WHERE res.isbn_liv = :isbn OR res.isbn_numerique_liv = :isbnNumerique OR res.isbn_liv = :isbnNumerique2 OR res.isbn_numerique_liv = :isbn2";
        $q = $this->connexion->prepare($sql);
        $q->bindValue(':id', $id, PDO::PARAM_INT);
        $q->bindValue(':isbn', $isbn, PDO::PARAM_STR);
        $q->bindValue(':isbnNumerique', $isbnNum, PDO::PARAM_STR);
        $q->bindValue(':isbnNumerique2', $isbnNum, PDO::PARAM_STR);
        $q->bindValue(':isbn2', $isbn, PDO::PARAM_STR);


        $q->execute();
        $resultat = $q->fetchAll(PDO::FETCH_ASSOC);
        if($resultat[0]['COUNT(1)'] != 0){
          return true;
        }else{
          return false;
        }
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
