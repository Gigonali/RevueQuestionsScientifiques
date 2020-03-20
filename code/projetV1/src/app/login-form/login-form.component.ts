import { Component, OnInit, HostListener } from '@angular/core';
import { Router } from '@angular/router';

@Component({
  selector: 'app-login-form',
  templateUrl: './login-form.component.html',
  styleUrls: ['./login-form.component.css']
})
export class LoginFormComponent implements OnInit {
  // taille écran
  public innerWidth: any;

  // pour savoir si l'alerte doit être affichée ou pas
  showAlert = true;

  constructor(private router: Router) { }

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

  }

}
