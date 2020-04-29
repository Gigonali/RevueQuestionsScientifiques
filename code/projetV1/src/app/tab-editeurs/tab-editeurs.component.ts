import { Component, OnInit, Input } from '@angular/core';
import { NgbModal } from '@ng-bootstrap/ng-bootstrap';
import { Observable } from 'rxjs';

// interfaces
import { MaisonEdition } from '../interfaces/maison-edition';

// Services
import { MaisonEditionService } from '../services/maison-edition.service';

@Component({
  selector: 'app-tab-editeurs',
  templateUrl: './tab-editeurs.component.html',
  styleUrls: ['./tab-editeurs.component.css']
})

export class TabEditeursComponent implements OnInit {
  @Input()
  listeMaisonEditions: Array<MaisonEdition>;
  maisonEditionsObs$: Observable<MaisonEdition[]>;
  ajoutMaisonEdition: MaisonEdition = {id: 0, nom: '', nomClassement: '', nomCorrespondant: '', mailCorrespondant: '', adrNumero: '',
  adrRue: '', adrCp: '', adrVille: '', adrPays: ''};
  maisonEditionMod: MaisonEdition;

  constructor(private maisonEditionService: MaisonEditionService, private modalService: NgbModal) { }

  ngOnInit(): void {
    this.refreshMaisonEditions();
  }

  refreshMaisonEditions() {
    const sub = this.maisonEditionService.getAll().subscribe(maisonEditions => {
      this.listeMaisonEditions = maisonEditions;
      sub.unsubscribe();
    });
  }

  ajouterMaisonEdition(me: MaisonEdition) {
    const sub = this.maisonEditionService.ajouter(me)
    .subscribe(maisonEditions => {
      this.refreshMaisonEditions();
      sub.unsubscribe();
    });
    // this.ajoutMaisonEdition;
  }

  modifierMaisonEdition(me: MaisonEdition) {
    const sub = this.maisonEditionService.modifier(me)
    .subscribe(maisonEditions => {
      this.refreshMaisonEditions();
      sub.unsubscribe();
    });
  }

  deleteMaisonEdition(id: number) {
    const sub = this.maisonEditionService.delete(id)
    .subscribe(data => {
      this.refreshMaisonEditions();
      sub.unsubscribe();
    });
  }

  // affiche modal
  openSmModif(content, me: MaisonEdition) {
    this.maisonEditionMod = {id: me.id, nom: me.nom, nomClassement: me.nomClassement, nomCorrespondant: me.nomCorrespondant,
      mailCorrespondant: me.mailCorrespondant, adrNumero: me.adrNumero, adrRue: me.adrRue, adrCp: me.adrCp, adrVille: me.adrVille,
      adrPays: me.adrPays};
    this.openSm(content);
  }

  openSm(content) {
    this.modalService.open(content, { size: 'sm' });
  }

  onCancel(modal: any) {
    modal.close('Close click');
  }

}
