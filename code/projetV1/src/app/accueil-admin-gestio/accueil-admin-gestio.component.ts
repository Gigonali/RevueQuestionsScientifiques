import { Component, OnInit } from '@angular/core';

interface Echeance {
  id: number;
  libelle: string;
  date: Date;
}

@Component({
  selector: 'app-accueil-admin-gestio',
  templateUrl: './accueil-admin-gestio.component.html',
  styleUrls: ['./accueil-admin-gestio.component.css']
})
export class AccueilAdminGestioComponent implements OnInit {
  // données test
  listeEcheances: Echeance[] = [
    {id: 0, libelle: 'Échéance 1', date: new Date()},
    {id: 1, libelle: 'Échéance 2', date: new Date()},
    {id: 2, libelle: 'Échéance 3', date: new Date()}
  ];
  // données test

  // Pour la date
  stringDate: string;

  // liste des échéances
  echeances: Echeance[] = this.listeEcheances;

  constructor() { }

  ngOnInit(): void {
  }

  // formater date
  formatDate(tempDate: Date) {
    this.stringDate = tempDate.getDate() + '/' + tempDate.getMonth().toLocaleString('fr-BE') + '/' + tempDate.getFullYear();

    return this.stringDate;
  }

}
