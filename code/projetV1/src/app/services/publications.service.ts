import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';
import { environment } from 'src/environments/environment';

// Interfaces
import { Publication } from '../interfaces/publications';

@Injectable({
  providedIn: 'root'
})
export class PublicationsService {

  constructor(private http: HttpClient) { }

  getPublication(): Observable<Publication[]> {
    return this.http.get<Publication[]>(environment.apiURL);
  }
}
