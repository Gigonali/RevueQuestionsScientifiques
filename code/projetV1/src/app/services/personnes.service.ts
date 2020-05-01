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

  getPersonne(): Observable<Personne[]> {
    return this.http.get<Personne[]>(environment.apiPersonne);
  }

}
