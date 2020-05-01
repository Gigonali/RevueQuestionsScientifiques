import { Component, OnInit, Input } from '@angular/core';
import { NgbModal } from '@ng-bootstrap/ng-bootstrap';
import { Observable } from 'rxjs';

// interfaces
import { Revue } from '../interfaces/revue';

// Services
import { RevueService } from '../services/revue.service';

@Component({
  selector: 'app-tab-revue',
  templateUrl: './tab-revue.component.html',
  styleUrls: ['./tab-revue.component.css']
})
export class TabRevueComponent implements OnInit {
  @Input()
  listRevues: Array<Revue>;
  revuesObs$: Observable<Revue[]>;
  // sert pour l'ajout
  ajoutRevue: Revue = {id_rev: 0, numero_rev: null, special_helha_rev: -1};
  // sert pour la modification
  revueMod: Revue;
  currentNumber: number;
  // sert pour sauvegarder le tri choisi
  sortByMemo: {numero: boolean, isSpecialHelha: number} = {numero: false, isSpecialHelha: 0};
  // sert pour les erreurs
  erreur: {isError: boolean, message: string};

  constructor(private revueService: RevueService, private modalService: NgbModal) { }

  ngOnInit(): void {
    if (this.sortByMemo.numero || this.sortByMemo.isSpecialHelha !== -1) {
      this.sortBy(this.sortByMemo.numero, this.sortByMemo.isSpecialHelha);
    }
    this.refreshRevues();
  }

  /* fonctions pour les revues */
  refreshRevues() {
    // récupère toutes les revues
    const sub = this.revueService.getAll().subscribe(revues => {
      this.listRevues = revues;
      sub.unsubscribe();
    });
    this.erreur = {isError: false, message: ''};
  }

  ajouterRevue(modal: any, revue: Revue) {
      if (this.listRevues.every(r => r.numero_rev !== revue.numero_rev)) { // regarde si le numéro existe déjà
        const sub = this.revueService.ajouter(revue)
        .subscribe(revues => {
          this.refreshRevues();
          sub.unsubscribe();
        });
        modal.close(); // ferme le modal
      } else {
        // le numéro existe déjà
        this.erreur = {isError: true, message: 'Ajout impossible : une revue contient déjà ce numéro !'};
      }
      this.ajoutRevue = {id_rev: 0, numero_rev: null, special_helha_rev: 0};
  }

  modifierRevue(modal: any, revue: Revue) {
    if (this.listRevues.every(r => r.numero_rev !== revue.numero_rev)) { // regarde si le numéro existe déjà
      // modifie la revue
      const sub = this.revueService.modifier(revue)
      .subscribe(revues => {
        this.refreshRevues();
        sub.unsubscribe();
      });
      // ferme le modal
      modal.close();
    } else if (this.currentNumber === revue.numero_rev) {
      modal.close();
    } else {
      // le numéro existe déjà
      this.erreur = {isError: true, message: 'Modification impossible : une revue possède déjà ce numéro !'};
    }
  }

  deleteRevue(modal: any, id: number) {
    // supprime la revue
    const sub = this.revueService.delete(id)
    .subscribe(data => {
       this.refreshRevues();
       sub.unsubscribe();
    });
    modal.close();
  }

  // pour trier la liste
  sortBy(modifNum: boolean, num: number) {
    if (modifNum) {
      this.listRevues.reverse();
    } else {
      switch (this.sortByMemo.isSpecialHelha) {
        case 1 :
          this.sortByMemo.isSpecialHelha = 2;
          this.listRevues.sort((a, b) => a.special_helha_rev - b.special_helha_rev);
          break;
        case 2 :
          this.sortByMemo.isSpecialHelha = 0;
          this.listRevues.sort((a, b) => a.special_helha_rev - b.special_helha_rev).reverse();
          break;
        default :
          this.sortByMemo.isSpecialHelha = 1;
          this.refreshRevues();
          break;
      }
    }
  }
  /* fonctions pour les revues */

  /* fonctions pour les modals */
  // affiche modal
  openSmModif(content, object: Revue) {
    // initialise la variable pour préremplir les champs
    this.revueMod = {id_rev: object.id_rev, numero_rev: object.numero_rev, special_helha_rev: object.special_helha_rev};
    // sauvegarde la numero avtuel de la revue
    this.currentNumber = object.numero_rev;
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
