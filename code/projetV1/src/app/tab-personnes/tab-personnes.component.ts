import { Component, OnInit, Input } from '@angular/core';
import { NgbModal } from '@ng-bootstrap/ng-bootstrap';
import { Observable } from 'rxjs';
import { Personne } from '../interfaces/personnes';
import { PersonnesService } from '../services/personnes.service';

@Component({
  selector: 'app-tab-personnes',
  templateUrl: './tab-personnes.component.html',
  styleUrls: ['./tab-personnes.component.css']
})
export class TabPersonnesComponent implements OnInit {
  @Input()
  listePersonnes: Array<Personne>;
  personnesObs$: Observable<Personne[]>;
  // sert pour l'ajout
  ajoutPersonne: Personne;
  // sert pour la modification
  personneMod: Personne;

  // sert pour les erreurs
  erreur: {isError: boolean, message: string};

  constructor(private personneService: PersonnesService, private modalService: NgbModal) { }

  ngOnInit(): void {
    this.refreshPersonnes();
  }

  /* fontions pour les personnes */
  refreshPersonnes() {
    // récupère toutes les personnes
    const sub = this.personneService.getAll().subscribe(personnes => {
      this.listePersonnes = personnes;
      sub.unsubscribe();
    });
  }

  ajouterPersonne(modal: any, personne: Personne) {
    return null;
  }

  modifierPersonne(modal: any, personne: Personne) {
    return null;
  }

  deletePersonne(modal: any, id: number) {
    return null;
  }

  getRolePersonne(personne: Personne) {
    let roles = [];

    if (personne.estContact_pers) { roles.push('Contact'); }
    if (personne.estRecenseur_pers) { roles.push('Recenceur'); }

    return roles.join(', ');

  }
  /* fonctions pour les personnes */

  /* fonctions pour les modals */
  // affiche modal
  openSmModif(content, object: Personne) {
    // initialise la variable pour préremplir les champs
    this.personneMod = null;
    // ouvre le modal
    this.openSm(content);
  }

  openSm(content) {
    // ouvre le modal
    this.modalService.open(content, { size: 'sm' });
  }

  onCancel(modal: any) {
    // ferme la modal
    modal.close();
    // réinitialise le variable d'erreur
    this.erreur = {isError: false, message: ''};
  }
  /* fonctions pour les modals */

}
