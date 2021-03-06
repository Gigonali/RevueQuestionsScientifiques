import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';
import { environment } from 'src/environments/environment';

// interfaces
import { Domaine } from '../interfaces/domaine';

@Injectable({
  providedIn: 'root'
})
export class DomaineService {

  constructor(private http: HttpClient) { }
  get(id: number): Observable<Domaine> {
    return this.http.get<Domaine>(`${environment.apiDomaine}?id=${id}`);
  }

  getAll(): Observable<Domaine[]> {
    return this.http.get<Domaine[]>(environment.apiDomaine);
  }

  ajouter(domaine: Domaine): Observable<any> {

    return this.http.put<any>(`${environment.apiDomaine}`, domaine);
  }

  total(): Observable<number> {
    return this.http.get<number>(`${environment.apiDomaine}?total=true`);
  }


  modifier(domaine: Domaine): Observable<any> {
    return this.http.post<any>(`${environment.apiDomaine}`, domaine);
  }

  delete(id: number): Observable<any> {
    return this.http.delete(`${environment.apiDomaine}?id=${id}`);
  }
}
