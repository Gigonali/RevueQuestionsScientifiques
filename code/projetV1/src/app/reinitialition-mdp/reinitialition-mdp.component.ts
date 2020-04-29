import { Component, OnInit } from '@angular/core';
import { ReinitialisationService } from '../services/reinitialisation.service';
import { ActivatedRoute, Router } from '@angular/router';
import { Subscription } from 'rxjs';
// interfaces
import { Authentifiant } from '../interfaces/authentifiant';

@Component({
  selector: 'app-reinitialition-mdp',
  templateUrl: './reinitialition-mdp.component.html',
  styleUrls: ['./reinitialition-mdp.component.css']
})
export class ReinitialitionMdpComponent implements OnInit {
  sub: Subscription;
  vueMdp = false;
  code: string;
  email: string;
  mdp: string;
  mdpconfirm: string;
  auth: Authentifiant = {};
  constructor(private router: Router, private reinitService: ReinitialisationService, private route: ActivatedRoute) { }

  ngOnInit(): void {
    this.sub = this.route.params.subscribe( params => {if (params['email'] !== undefined && params['code'] !== undefined) {
      this.code = params['code'];
      this.email = params['email'];
      this.reinitService.verifCode(this.code, this.email).subscribe(answer => {
        if (answer === 1) {
          this.vueMdp = true;
        }
        this.sub.unsubscribe();
      });
    }});
  }


  reinitialiser(): void {
    this.sub = this.reinitService.reinitialiserMdp(this.email).subscribe();
  }

  modifier(): void{
    this.auth.mailCo = this.email;
    this.auth.mdp = this.mdp;
    this.sub = this.reinitService.modifierMdp(this.auth).subscribe( res => {
      this.sub.unsubscribe();
      this.router.navigate(['connexion']);
    } );

  }
}
