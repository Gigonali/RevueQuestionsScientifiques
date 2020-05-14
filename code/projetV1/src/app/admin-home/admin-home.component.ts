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
  testUser: Personne = {id_pers: 0, nom_pers: 'Stoffel', prenom_pers: 'Jean-François', estGestionnaire_pers: 1,
                        estAuteur_pers: 0, estRecenseur_pers: 0,estExpert_pers: 0, estContact_pers: 0};
  // données de test

  // données de la personne
  user: Personne = this.testUser;

  // pour savoir quel tab afficher
  tabSelected: string;

  // pour cacher le menu
  menuToggle = true;

  // pour simplifier la structure de showMenu
  publiEnCours: string[] = ['articlesEnCours', 'analysesCritiqueEnCours', 'comptesRendusEnCours', 'diversEnCours', 'specialHelhaEnCours'];
  publiTerminees: string[] = ['articlesTerminees', 'analysesCritiqueTerminees',
                              'comptesRendusTerminees', 'diversTerminees', 'specialHelhaTerminees'];
  livres: string[] = ['livresTous', 'livresEnAttenteAction', 'livresEnDemande', 'livresEnRedaction', 'livresEnProduction', 'livresPublies'];
  personnes: string[] = ['personnesToutes', 'personnesAuteurs', 'personnesRecenseurs', 'personnesExperts', 'personnesDivers'];

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
  hideMenu() {
    this.menuToggle = false;
    this.publicationsList = false;
    this.publicationsEnCoursList = false;
    this.publicationsTermineesList = false;
    this.livresList = false;
    this.personnesList = false;

  }

  // Montrer le menu
  showMenu(listClic: string) {
    this.menuToggle = true;

    switch (listClic) {
      case 'publications':
        if (this.publiEnCours.includes(this.tabSelected)) {
          this.publicationsList = true;
          this.publicationsEnCoursList = true;
        } else if (this.publiTerminees.includes(this.tabSelected)) {
          this.publicationsList = true;
          this.publicationsTermineesList = true;
        }
        break;
      case 'livres':
        this.livresList = true;
        break;
      case 'personne':
        this.personnesList = true;
        break;
      default:
        if (this.publiEnCours.includes(this.tabSelected)) {
          this.publicationsList = true;
          this.publicationsEnCoursList = true;
        } else if (this.publiTerminees.includes(this.tabSelected)) {
          this.publicationsList = true;
          this.publicationsTermineesList = true;
        } else if (this.livres.includes(this.tabSelected)) {
          this.livresList = true;
        } else if (this.personnes.includes(this.tabSelected)) {
          this.personnesList = true;
        }
        break;
    }

  }

  // cacher/montrer liste dans le menu
  collapseList(liste: string) {
    switch (liste) {
      case 'publicationsList':
        if (this.menuToggle) {
          this.publicationsList = !this.publicationsList;
        }
        break;
      case 'publicationsEnCoursList': this.publicationsEnCoursList = !this.publicationsEnCoursList; break;
      case 'publicationsTermineesList': this.publicationsTermineesList = !this.publicationsTermineesList; break;
      case 'livresList': this.livresList = !this.livresList; break;
      case 'personnesList': this.personnesList = !this.personnesList; break;
      default:
        this.publicationsList = false;
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
