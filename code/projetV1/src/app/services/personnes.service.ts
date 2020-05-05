import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';
import { environment } from 'src/environments/environment';

// Interfaces
import { Personne } from '../interfaces/personnes';

@Injectable({
  providedIn: 'root'
})
export class PersonnesService {

  constructor(private http: HttpClient) { }

  get(id: number): Observable<Personne> {
    return this.http.get<Personne>(`${environment.apiPersonne}?id=${id}`);
  }

  getAll(): Observable<Personne[]> {
    return this.http.get<Personne[]>(environment.apiPersonne);
  }

  total(): Observable<number> {
    return this.http.get<number>(`${environment.apiPersonne}?total=true`);
  }

  ajouter(personne: Personne): Observable<any> {
    return this.http.put<any>(`${environment.apiPersonne}`, personne);
  }


  modifier(personne: Personne): Observable<any> {
    return this.http.post<any>(environment.apiPersonne, personne);
  }

  delete(id: number): Observable<any> {
    return this.http.delete(`${environment.apiPersonne}?id=${id}`);
  }

}
