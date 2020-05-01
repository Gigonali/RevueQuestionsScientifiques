import { Component, OnInit } from '@angular/core';
import { MaisonEdition } from '../interfaces/maison-edition';
import { Observable } from 'rxjs';
import { Livre } from '../interfaces/livre';
import { MaisonEditionService } from '../services/maison-edition.service';
import { NgbModal } from '@ng-bootstrap/ng-bootstrap';
import { LivreService } from '../services/livre.service';
import { EtatLivre } from '../interfaces/etat-livre';

@Component({
  selector: 'app-tab-livres',
  templateUrl: './tab-livres.component.html',
  styleUrls: ['./tab-livres.component.css']
})
export class TabLivresComponent implements OnInit {

  listeEtatsLivre: Array<EtatLivre> = [
    {id: 0, libelle: 'Emprunté'},
    {id: 1, libelle: 'Perdu'},
    {id: 2, libelle: 'En stock'},
  ];

  listeMaisonEditions: Array<MaisonEdition>;
  listeLivres: Array<Livre>;
  maisonEditionObs$: Observable<MaisonEdition[]>;
  livreObs$: Observable<Livre[]>;
  ajoutLivre: Livre;
  livreMod: Livre;

  constructor(private maisonEditionService: MaisonEditionService, private livreService: LivreService, private modalService: NgbModal) { }

  ngOnInit(): void {
    this.refreshLivres();
    this.refreshMaisonEditions();
    this.refreshEtatsLivre();
  }

  refreshMaisonEditions() {
    const sub = this.maisonEditionService.getAll().subscribe(maisonEditions => {
      this.listeMaisonEditions = maisonEditions;
      sub.unsubscribe();
    });
  }

  refreshEtatsLivre() {
    const sub = this.livreService.getAllEtatsLivre().subscribe(etatsLivre => {
      this.listeEtatsLivre = etatsLivre;
      sub.unsubscribe();
    });
  }

  refreshLivres() {
    const sub = this.livreService.getAll().subscribe(livres => {
      this.listeLivres = livres;
      sub.unsubscribe();
    });
  }


  initAjoutLivre(){
    this.ajoutLivre = {id: 0,
      isbn: '',
      isbnNum: '',
      nomAuteur: '',
      prenomAuteur: '',
      titre: '',
      annee: null,
      collection: '',
      pages: 0,
      prix: 0,
      brochure: '',
      responsabiliteEdition: '',
      responsabiliteTraduction: '',
      idEtatLivre: 0};
  }



  ajouterLivre(livre: Livre) {
    const sub = this.livreService.ajouter(livre)
    .subscribe(livre => {
      this.refreshLivres();
      this.initAjoutLivre();
      sub.unsubscribe();
    });
  }

  modifierLivre(livre: Livre) {
    const sub = this.livreService.modifier(livre)
    .subscribe(livre => {
      this.refreshMaisonEditions();
      this.initAjoutLivre();
      sub.unsubscribe();
    });
  }

  deleteLivre(id: number) {
    const sub = this.livreService.delete(id)
    .subscribe(data => {
      this.refreshLivres();
      sub.unsubscribe();
    });
  }

  // affiche modal
  openSmModif(content, livre: Livre) {
    this.livreMod = {id: livre.id,
      isbn: livre.isbn,
      isbnNum: livre.isbnNum,
      nomAuteur: livre.nomAuteur,
      prenomAuteur: livre.prenomAuteur,
      titre: livre.titre,
      annee: livre.annee,
      collection: livre.collection,
      pages: livre.pages,
      prix: livre.prix,
      brochure: livre.brochure,
      responsabiliteEdition: livre.responsabiliteEdition,
      responsabiliteTraduction: livre.responsabiliteTraduction,
      idEtatLivre: livre.idEtatLivre};
    this.openSm(content);
  }

  openSm(content) {
    this.modalService.open(content, { size: 'xl' });
  }

  onCancel(modal: any) {
    modal.close('Close click');
    this.initAjoutLivre();
  }

  fillLivreForModif(id: number) {
    this.listeLivres.forEach(livre => {
      if (livre.id === id) {
        this.ajoutLivre.id = livre.id;
        this.ajoutLivre.isbn = livre.isbn;
        this.ajoutLivre.isbnNum = livre.isbnNum;
        this.ajoutLivre.nomAuteur = livre.nomAuteur;
        this.ajoutLivre.prenomAuteur = livre.prenomAuteur;
        this.ajoutLivre.titre = livre.titre;
        this.ajoutLivre.annee = livre.annee;
        this.ajoutLivre.collection = livre.collection;
        this.ajoutLivre.pages = livre.pages;
        this.ajoutLivre.prix = livre.prix;
        this.ajoutLivre.brochure = livre.brochure;
        this.ajoutLivre.responsabiliteEdition = livre.responsabiliteEdition;
        this.ajoutLivre.responsabiliteTraduction = livre.responsabiliteTraduction;
        this.ajoutLivre.idEtatLivre = livre.idEtatLivre;
      }
    });
  }
}
