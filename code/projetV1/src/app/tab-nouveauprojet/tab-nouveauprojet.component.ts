import { Component, OnInit} from '@angular/core';
import { NgbModal } from '@ng-bootstrap/ng-bootstrap';
import { Router } from '@angular/router';

// interface
import { Action } from '../interfaces/action';

interface EtatPublication {
  id: number;
  libelle: string;
}

@Component({
  selector: 'app-tab-nouveauprojet',
  templateUrl: './tab-nouveauprojet.component.html',
  styleUrls: ['./tab-nouveauprojet.component.css']
})
export class TabNouveauprojetComponent implements OnInit {
  // données de test
  listeActions: Action[] = [
    {id: 0, date: new Date(), memo: 'action 1'},
    {id: 1, date: new Date(), memo: 'action 2'},
    {id: 2, date: new Date(), memo: 'action 3'}
  ]

  listEtatsPublication: EtatPublication[] = [
    {id: 0, libelle: 'Projet refusé'},
    {id: 1, libelle: 'Projet reçu'},
    {id: 2, libelle: 'En cours d\'expertise'},
    {id: 3, libelle: 'En cours de révision'},
    {id: 4, libelle: 'Dépôt de la version finale en cours'},
    {id: 5, libelle: 'Version finale déposées'},
    {id: 6, libelle: 'Epreuves corrigées'},
    {id: 7, libelle: 'Prépublication disponible aux abonnés'},
    {id: 8, libelle: 'Publication effective'}
  ]
  // données de test

  // contient les actions
  actions: Action[] = this.listeActions;

  // contient les états de publication
  etatsPublication: EtatPublication[] = this.listEtatsPublication;

  // Pour la date
  stringDate: string;


  constructor(private router: Router, private modalService: NgbModal) { }

  ngOnInit(): void {
  }

  // formulaire
  onSubmit() {
    // traitement infos form

  }

  onReset(modal: any) {
    // traitement reset form
    modal.close('Close click');
  }

  onCancel(modal: any) {
    // annule le form
    modal.close('Close click');
    window.location.reload(); // à revoir pour revenir à l'accueil
  }

  // ajoute action
  addAction() {
    // traitement ajout action
  }

  // affiche modal
  openSm(content) {
    this.modalService.open(content, { size: 'sm' });
  }

  // formater date
  formatDate(tempDate: Date) {
    this.stringDate = tempDate.getDate() + '/' + tempDate.getMonth().toLocaleString('fr-BE') + '/' + tempDate.getFullYear();

    return this.stringDate;
  }

}
