import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';
import { environment } from 'src/environments/environment';

// interfaces
import { Livre } from '../interfaces/livre';

@Injectable({
  providedIn: 'root'
})
export class LivreService {

  constructor(private http: HttpClient) { }

  get(id: number): Observable<Livre> {
    return this.http.get<Livre>(`${environment.apiLivre}?id=${id}`);
  }

  getAll(): Observable<Livre[]> {
    return this.http.get<Livre[]>(environment.apiLivre);
  }

  total(): Observable<number> {
    return this.http.get<number>(`${environment.apiLivre}?total=true`);
  }

  ajouter(l: Livre): Observable<any> {
    return this.http.put<any>(`${environment.apiLivre}`, l);
  }


  modifier(l: Livre): Observable<any> {
    return this.http.post<any>(environment.apiLivre, l);
  }

  delete(id: number): Observable<any> {
    return this.http.delete(`${environment.apiLivre}?id=${id}`);
  }
}
