import { Component, OnInit, Input } from '@angular/core';

interface Personne {
  id: number;
  nom: string;
  prenom: string;
}

@Component({
  selector: 'app-admin-home',
  templateUrl: './admin-home.component.html',
  styleUrls: ['./admin-home.component.css']
})
export class AdminHomeComponent implements OnInit {
  // donées de test
  testUser: Personne = {id: 0, nom: 'Stoffel', prenom: 'Jean-François'};
  // données de test

  // données de la personne
  user: Personne = this.testUser;

  // pour savoir quel tab afficher
  tabSelected: string;

  // pour cacher le menu
  menuToggle = true;

  // pour afficher le message de bienvenu
  showBvnMessage = true;

  constructor() { }

  ngOnInit(): void {
    setTimeout(() => { this.showBvnMessage = !this.showBvnMessage; }, 5000);
  }

  // changer de tab
  changeTab(tab: string) {
    this.tabSelected = tab;
  }

  // cacheer le menu
  toggleMenu() {
    this.menuToggle = !this.menuToggle;
  }

  // pour cacher le message de bvn
  showBvnMsg() {
    this.showBvnMessage = !this.showBvnMessage;
  }

}
