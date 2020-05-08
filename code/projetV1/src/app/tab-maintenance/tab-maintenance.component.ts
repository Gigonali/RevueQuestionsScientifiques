import { Component, OnInit } from '@angular/core';
import { MaintenanceService } from '../maintenance.service';
import { Subscription, Observable } from 'rxjs';
import { stringify } from 'querystring';

@Component({
  selector: 'app-tab-maintenance',
  templateUrl: './tab-maintenance.component.html',
  styleUrls: ['./tab-maintenance.component.css']
})
export class TabMaintenanceComponent implements OnInit {
  private const: Subscription;
  public date: string;
  constructor(private maintService: MaintenanceService) { }

  exporter(): void {
    this.const = this.maintService.exporter().subscribe( x => {
      this.const.unsubscribe();
    });
  }

  importer(): void {
    // TO DO
  }

  getLastDateBackup(): void {
    this.maintService.getDate().subscribe( dateString => {
      this.date = dateString;
    },
     error => console.log('HTTP Error', error)
);
  }

  ngOnInit(): void {
    this.getLastDateBackup();
  }

}
