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
  }

  ajouterDomaine(domaine: Domaine) {

    const sub = this.domaineService.ajouter(domaine)
      .subscribe(data => {
        this.refreshDomaine();
        sub.unsubscribe();
      });
    this.ajoutDomaine = {id: 0, libelle: ''};
  }

  modifierDomaine(domaine: Domaine) {
    const sub = this.domaineService.modifier(domaine)
    .subscribe(domaines => {
      this.refreshDomaine();
      sub.unsubscribe();
    });
  }

  deleteDomaine(id: number) {
    const sub = this.domaineService.delete(id)
    .subscribe(data => {
       this.refreshDomaine();
       sub.unsubscribe();
    });
  }

  // affiche modal
  openSm(content: any) {
    this.modalService.open(content, { size: 'sm' });
  }

  onCancel(modal: any) {
    modal.close('Close click');
  }

}
