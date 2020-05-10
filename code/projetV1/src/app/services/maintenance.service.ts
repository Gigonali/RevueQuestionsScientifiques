import { Injectable } from '@angular/core';
import { Observable, of} from 'rxjs';
import { environment } from 'src/environments/environment';
import { HttpClient } from '@angular/common/http';


@Injectable({
  providedIn: 'root'
})
export class MaintenanceService {

  constructor(private http: HttpClient) { }

  exporter(): Observable<any> {
    return this.http.get<any>(`${environment.apiMaintenance}`);
  }

  getDate(): Observable<string> {
    return this.http.get<string>(`${environment.apiMaintenance}?date=true`);
  }

}

