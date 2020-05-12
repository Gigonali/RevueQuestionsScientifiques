import { Injectable } from '@angular/core';
import { HttpClient} from '@angular/common/http';
import { Observable } from 'rxjs';
import { environment } from 'src/environments/environment';
// interfaces
import { Authentifiant } from '../interfaces/authentifiant';

@Injectable({
  providedIn: 'root'
})
export class AuthentificationService {

  constructor(private http: HttpClient) { }

  connecter(authentifiant: Authentifiant): Observable<number> {
    return this.http.post<number>(`${environment.apiAuthentification}`, authentifiant);
  }

  /* connecter(authentifiant: Authentifiant): Observable<any> {
    return this.http.post<any>(`${environment.apiAuthentification}`, authentifiant);
  } */
}
