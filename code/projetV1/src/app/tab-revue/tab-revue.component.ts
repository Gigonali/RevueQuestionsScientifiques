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
  listRevues: Array<Revue> = [{id: 1, numero: 4, specialHELHa: false}, {id: 1, numero: 5, specialHELHa: true}];
  revuesObs$: Observable<Revue[]>;

  constructor(private revueService: RevueService, private modalService: NgbModal) { }

  ngOnInit(): void {
    //this.refreshRevues();
  }

  refreshRevues() {
    // subscribe

    const sub = this.revueService.getAll().subscribe(revues => {
      this.listRevues = revues;
      sub.unsubscribe();
    });
  }

  modifierRevue(revue: Revue) {
    const sub = this.revueService.modifier(revue);
    this.refreshRevues();
  }

  deleteRevue(id: number) {
    const sub = this.revueService.delete(id);
    this.refreshRevues();
    /*.subscribe(data => {
       this.listRevues = this.listRevues.filter(rev => rev.id !== id);
       sub.unsubscribe();
    });*/
  }

  // affiche modal
  openSm(content) {
    this.modalService.open(content, { size: 'sm' });
  }

  onDelete(modal: any, idRevue: number) {
    this.deleteRevue(idRevue);
    modal.close('Close click');
  }

  onCancel(modal: any) {
    modal.close('Close click');
    window.location.reload(); // à revoir pour revenir à l'accueil
  }

}
