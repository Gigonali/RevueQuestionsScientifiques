import { Injectable } from '@angular/core';
import { Observable, of} from 'rxjs';
import { environment } from 'src/environments/environment';
import { HttpClient } from '@angular/common/http';


@Injectable({
  providedIn: 'root'
})
export class MaintenanceService {

  constructor(private http: HttpClient) { }

  exporter(): Observable<boolean> {
    return this.http.get<boolean>(`${environment.apiMaintenance}`);
  }

  getDate(): Observable<string> {
    return this.http.post<string>(`${environment.apiMaintenance}?date=true`,{responseType: 'text'});
  }

}

