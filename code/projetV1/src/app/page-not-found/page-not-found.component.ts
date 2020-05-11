import { Component, OnInit } from '@angular/core';
import { Title } from '@angular/platform-browser';
import { Router } from '@angular/router';

@Component({
  selector: 'app-page-not-found',
  templateUrl: './page-not-found.component.html',
  styleUrls: ['./page-not-found.component.css']
})
export class PageNotFoundComponent implements OnInit {

  public constructor(private titleService: Title, private router: Router ) { }

  ngOnInit(): void {
    this.titleService.setTitle('RQS | Erreur 404');
  }

}
