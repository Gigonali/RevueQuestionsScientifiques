import { Component, OnInit, HostListener } from '@angular/core';
import { Router } from '@angular/router';
import { FormGroup, FormControl, Validators } from '@angular/forms';
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
  /* Affichage */
  // taille écran
  public innerWidth: any;

  // pour savoir si l'alerte doit être affichée ou pas
  showAlert = true;
  /* Affichage */

  // authentifiants
  authentifiantsForm = new FormGroup({
    email: new FormControl('', [
      Validators.required/*,
    Validators.pattern(/^\S+@.\S+\.\S+$/)*/]),
    mdp: new FormControl('', [
      Validators.required/*,
      Validators.pattern(/^(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*#?&])[A-Za-z\d$@$!%*#?&]{8,20}$/)*/])
    });

  authentifiant: Authentifiant;
  sub: Subscription;

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
    this.router.navigate(['admin']);
    /*this.authentifiant.mailCo = this.authentifiantsForm.get('email').value;
    this.authentifiant.mdp = this.authentifiantsForm.get('mdp').value;
    this.sub = this.authService.connecter( this.authentifiant).subscribe( result => {
      if (result > 0) {
        this.authentifiant.mailCo = this.authentifiantsForm.get('email').value;
        this.authentifiant.mdp = this.authentifiantsForm.get('mdp').value;

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
      }
    });

      /* this.authService.connecter({mailCo: this.authentifiantsForm.get('email').value,
                                  mdp: this.authentifiantsForm.get('mdp').value })
                    .subscribe(auth => {
        // traitement après retour
        // local storage
        console.log(auth);

      }); */

  }

  // Getter
  get emailCo() {
    return this.authentifiantsForm.get('email');
  }

  get mdpCo() {
    return this.authentifiantsForm.get('mdp');
  }

}
