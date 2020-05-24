import { Component, OnInit, HostListener } from '@angular/core';
import { Router } from '@angular/router';
import { Subscription } from 'rxjs';
// services
import { AuthentificationService } from '../services/authentification.service';
// interfaces
import { Authentifiant } from '../interfaces/authentifiant';

@Component({
  selector: 'app-login-form',
  templateUrl: './login-form.component.html',
  styleUrls: ['./login-form.component.css']
})
export class LoginFormComponent implements OnInit {
  // taille écran
  public innerWidth: any;
  authentifiant: Authentifiant = {};
  sub: Subscription;

  // pour savoir si l'alerte doit être affichée ou pas
  showAlert = true;

  constructor(private router: Router, private authService: AuthentificationService) { }

  ngOnInit(): void {
    this.innerWidth = window.innerWidth;
  }

  // Pour mettre à jour la taille si la
  // fenêtre est redimensionée
  @HostListener('window:resize', ['$event'])
  onResize(event) {
    this.innerWidth = window.innerWidth;
  }


  // click sur le bouton connexion
  onSignIn() {
    if(this.authentifiant.mailCo !== undefined && this.authentifiant.mdp !== undefined ){
      this.sub = this.authService.connecter(this.authentifiant).subscribe( result => {
        if (result > 0) {
          localStorage.setItem('auth', JSON.stringify(this.authentifiant));
          this.sub.unsubscribe();
          switch (result) {
            case 1:
              //GESTIONNAIRE
              break;
            case 2:
              this.router.navigate(['admin']);
              break;
            case 3:
            //AUTEUR
            break;
          }

        } else {
          alert('Votre login ou mot de passe est erroné');
          this.authentifiant = {};
        }
      });
    } else {
      alert('Veiller à remplir les champs');
    }



  }

}
