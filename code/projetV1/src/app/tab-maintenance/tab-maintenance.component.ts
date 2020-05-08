import { Component, OnInit } from '@angular/core';
import { MaintenanceService } from '../services/maintenance.service';
import { Subscription, Observable } from 'rxjs';
import { stringify } from 'querystring';
import { environment } from 'src/environments/environment';

@Component({
  selector: 'app-tab-maintenance',
  templateUrl: './tab-maintenance.component.html',
  styleUrls: ['./tab-maintenance.component.css']
})
export class TabMaintenanceComponent implements OnInit {
  private const: Subscription;
  public date: string;
  // pour afficher ou non le message de résultat
  public backupReussi = -1;
  // pour stocker l'url pour télécharger manuellement le fichier
  public urlFile;

  constructor(private maintService: MaintenanceService) { }

  ngOnInit(): void {
      this.getLastDateBackup();
  }

  exporter(): void {
    this.const = this.maintService.exporter().subscribe(response => {
      // backup réussi
      this.backupReussi = 1;
      // récupère le lien au cas où pour le téléchargement manuel
      this.urlFile = environment.apiMaintenance;
      const blob = new Blob([response], { type: 'text/sql' });
      // gestion téléchargement
      if (window.navigator.msSaveOrOpenBlob) {
        window.navigator.msSaveBlob(blob, 'backupRQS.sql');
      } else {
        const elem = window.document.createElement('a');
        elem.href = window.URL.createObjectURL(blob);
        elem.download = 'backupRQS.sql';
        document.body.appendChild(elem);
        elem.click();
        document.body.removeChild(elem);
      }
      // gestion téléchargement

      // refresh la date
      this.getLastDateBackup();

      this.const.unsubscribe();

    }, error => {
      // backup échoué
      this.backupReussi = 0;
    });
    // disprition du message de résultat
    setTimeout(() => this.backupReussi = -1, 30000);
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



}
