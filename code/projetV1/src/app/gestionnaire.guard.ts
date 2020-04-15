import { Injectable } from '@angular/core';
import { CanActivate, ActivatedRouteSnapshot, RouterStateSnapshot, UrlTree } from '@angular/router';
import { Observable, Subscription } from 'rxjs';
import { Authentifiant } from './authentifiant';
import { AuthentificationService } from './authentification.service';

@Injectable({
  providedIn: 'root'
})
export class GestionnaireGuard implements CanActivate {
  auth: Authentifiant;
  sub: Subscription;

  constructor(private authService: AuthentificationService) {}
  canActivate(
    next: ActivatedRouteSnapshot,
    state: RouterStateSnapshot): Observable<boolean | UrlTree> | Promise<boolean | UrlTree> | boolean | UrlTree {
    this.auth = JSON.parse(localStorage.getItem('auth'));
    this.sub = this.authService.connecter(this.auth).subscribe( result => {
      if (result === 1 ) {
        this.sub.unsubscribe();
        return true;
      } else {
        this.sub.unsubscribe();
        return false;
      }
    });
    return false;
  }

}
