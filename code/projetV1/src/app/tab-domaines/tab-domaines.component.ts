import { Component, OnInit, Input } from '@angular/core';
import { NgbModal } from '@ng-bootstrap/ng-bootstrap';
import { Observable } from 'rxjs';

// interfaces
import { Domaine } from '../interfaces/domaine';

// Services
import { DomaineService } from '../services/domaine.service';

@Component({
  selector: 'app-tab-domaine',
  templateUrl: './tab-domaines.component.html',
  styleUrls: ['./tab-domaines.component.css']
})
export class TabDomainesComponent implements OnInit {
  @Input()
  listDomaine: Array<Domaine>;
  ajoutDomaine: Domaine = {id: 0, libelle: ''};
  domaineObs$: Observable<Domaine[]>;
  currentString: string;
  domaineMod: Domaine;
  erreur: {isError: boolean, message: string};

  constructor(private domaineService: DomaineService, private modalService: NgbModal) { }

  ngOnInit(): void {
     this.refreshDomaine();
  }

  refreshDomaine() {
    // subscribe
    const sub = this.domaineService.getAll().subscribe(domaines => {
      this.listDomaine = domaines;
      sub.unsubscribe();
    });
    this.erreur = {isError: false, message: ''};
  }

  ajouterDomaine(modal: any, domaine: Domaine) {
    if (this.listDomaine.every(d => d.libelle.localeCompare(domaine.libelle))) {
    const sub = this.domaineService.ajouter(domaine)
      .subscribe(data => {
        this.refreshDomaine();
        sub.unsubscribe();
      });
    modal.close(); // ferme le modal
    } else {
      // le domaine existe déjà
      this.erreur = {isError: true, message: 'Ajout impossible : ce domaine existe déjà!'};
    }
    this.ajoutDomaine = {id: 0, libelle: ''};
  }

  modifierDomaine(domaine: Domaine, modal: any) {

    if (this.listDomaine.every(d => d.libelle.localeCompare(domaine.libelle))) {
      const sub = this.domaineService.modifier(domaine)
        .subscribe(data => {
          this.refreshDomaine();
          sub.unsubscribe();
        });
      modal.close(); // ferme le modal
      } else {
        // le domaine existe déjà
        this.erreur = {isError: true, message: 'Modification impossible : ce domaine existe déjà!'};
      }

}

  deleteDomaine(id: number) {
    const sub = this.domaineService.delete(id)
    .subscribe(data => {
       this.refreshDomaine();
       sub.unsubscribe();
    });
  }
  openSmModif(content, object: Domaine) {
    this.domaineMod = {id: object.id, libelle: object.libelle};
    this.currentString = object.libelle;
    this.openSm(content);
  }
  // affiche modal
  openSm(content: any) {
    this.modalService.open(content, { size: 'sm' });
  }

  onCancel(modal: any) {
    modal.close('Close click');
    this.erreur = {isError: false, message: ''};
  }

}
