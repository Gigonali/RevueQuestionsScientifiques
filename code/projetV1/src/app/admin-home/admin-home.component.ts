import { Component, OnInit, Input } from '@angular/core';

// interface
import { Personne } from '../interfaces/personnes';

@Component({
  selector: 'app-admin-home',
  templateUrl: './admin-home.component.html',
  styleUrls: ['./admin-home.component.css']
})
export class AdminHomeComponent implements OnInit {
  // données de test
  testUser: Personne = {id_pers: 0, nom_pers: 'Stoffel', prenom_pers: 'Jean-François', estRecenseur_pers: 0, estContact_pers: 0};
  // données de test

  // données de la personne
  user: Personne = this.testUser;

  // pour savoir quel tab afficher
  tabSelected: string;

  // pour cacher le menu
  menuToggle = true;

  // pour montrer les listes dans le menu
  publicationsList = false;
  publicationsEnCoursList = false;
  publicationsTermineesList = false;
  livresList = false;
  personnesList = false;

  // pour afficher le message de bienvenue
  showBvnMessage = true;

  constructor() { }

  ngOnInit(): void {
    setTimeout(() => { this.showBvnMessage = !this.showBvnMessage; }, 5000);
  }

  // changer de tab
  changeTab(tab: string) {
    this.tabSelected = tab;
  }

  // cacher le menu
  toggleMenu() {
    this.menuToggle = !this.menuToggle;
  }

  // montrer liste dans le menu
  collapseList(liste: string) {
    switch (liste) {
      case 'publicationsList': this.publicationsList = !this.publicationsList; break;
      case 'publicationsEnCoursList': this.publicationsEnCoursList = !this.publicationsEnCoursList; break;
      case 'publicationsTermineesList': this.publicationsTermineesList = !this.publicationsTermineesList; break;
      case 'livresList': this.livresList = !this.livresList; break;
      case 'personnesList': this.personnesList = !this.personnesList; break;
      default:
        this.personnesList = false;
        this.publicationsEnCoursList = false;
        this.publicationsTermineesList = false;
        this.livresList = false;
        this.personnesList = false;
    }
  }

  // pour cacher le message de bvn
  showBvnMsg() {
    this.showBvnMessage = !this.showBvnMessage;
  }

}
