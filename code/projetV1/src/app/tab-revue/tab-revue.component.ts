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
  ajoutRevue: Revue = {id_rev: 0, numero_rev: 0, special_helha_rev: 3};
  revueMod: Revue;

  constructor(private revueService: RevueService, private modalService: NgbModal) { }

  ngOnInit(): void {
    this.refreshRevues();
  }

  refreshRevues() {
    // subscribe
    const sub = this.revueService.getAll().subscribe(revues => {
      this.listRevues = revues;
      sub.unsubscribe();
    });
  }

  ajouterRevue(revue: Revue) {
      const sub = this.revueService.ajouter(revue)
      .subscribe(revues => {
        this.refreshRevues();
        sub.unsubscribe();
      });
      this.ajoutRevue = {id_rev: 0, numero_rev: 0, special_helha_rev: 3};
  }

  modifierRevue(revue: Revue) {
    const sub = this.revueService.modifier(revue)
    .subscribe(revues => {
      this.refreshRevues();
      sub.unsubscribe();
    });
  }

  deleteRevue(id: number) {
    const sub = this.revueService.delete(id)
    .subscribe(data => {
       this.refreshRevues();
       sub.unsubscribe();
    });
  }

  // affiche modal
  openSmModif(content, object: Revue) {
    this.revueMod = {id_rev: object.id_rev, numero_rev: object.numero_rev, special_helha_rev: object.special_helha_rev};
    this.openSm(content);
  }

  openSm(content) {
    this.modalService.open(content, { size: 'sm' });
  }

  onCancel(modal: any) {
    modal.close('Close click');
  }

}
