import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';
import { environment } from 'src/environments/environment';
import { Authentifiant } from '../authentifiant';

@Injectable({
  providedIn: 'root'
})
export class ReinitialisationService {

  constructor(private http: HttpClient) {}
  reinitialiserMdp(email: string): Observable<any>{
    return this.http.post<number>(`${environment.apiReinitialisation}`, {email: email});
  }

  modifierMdp(auth: Authentifiant): Observable<any>{
    return this.http.post<number>(`${environment.apiReinitialisation}`, auth);
  }

  verifCode(code: string, email: string): Observable<number> {
    return this.http.post<number>(`${environment.apiReinitialisation}`, {
      code,
      email
    });
  }
}
