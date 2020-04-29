import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';
import { environment } from 'src/environments/environment';

// interfaces
import { MaisonEdition } from '../interfaces/maison-edition';

@Injectable({
  providedIn: 'root'
})
export class MaisonEditionService {

  constructor(private http: HttpClient) { }

  get(id: number): Observable<MaisonEdition> {
    return this.http.get<MaisonEdition>(`${environment.apiMaisonEdition}?id=${id}`);
  }

  getAll(): Observable<MaisonEdition[]> {
    return this.http.get<MaisonEdition[]>(environment.apiMaisonEdition);
  }

  total(): Observable<number> {
    return this.http.get<number>(`${environment.apiMaisonEdition}?total=true`);
  }

  ajouter(me: MaisonEdition): Observable<any> {
    return this.http.put<any>(`${environment.apiMaisonEdition}`, me);
  }


  modifier(me: MaisonEdition): Observable<any> {
    return this.http.post<any>(environment.apiMaisonEdition, me);
  }

  delete(id: number): Observable<any> {
    return this.http.delete(`${environment.apiMaisonEdition}?id=${id}`);
  }
}
