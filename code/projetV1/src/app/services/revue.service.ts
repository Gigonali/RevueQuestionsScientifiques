import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';
import { environment } from 'src/environments/environment';

// interfaces
import { Revue } from '../interfaces/revue';

@Injectable({
  providedIn: 'root'
})
export class RevueService {

  constructor(private http: HttpClient) { }

  get(id: number): Observable<Revue> {
    return this.http.get<Revue>(`${environment.apiURL}?id=${id}`);
  }

  getAll(): Observable<Revue[]> {
    return this.http.get<Revue[]>(environment.apiURL);
  }

  total(): Observable<number> {
    return this.http.get<number>(`${environment.apiURL}?total=true`);
  }

  ajouter(revue: Revue): Observable<any> {
    console.log(revue);
    return this.http.put<any>(`${environment.apiURL}`, revue);
  }


  modifier(revue: Revue): Observable<any> {
    return this.http.post<any>(environment.apiURL, revue);
  }

  delete(id: number): Observable<any> {
    return this.http.delete(`${environment.apiURL}?id=${id}`);
  }

}
