import { Component, OnInit, Input } from '@angular/core';
import { NgbModal } from '@ng-bootstrap/ng-bootstrap';
import { Observable } from 'rxjs';
import { Personne } from '../interfaces/personnes';
import { PersonnesService } from '../services/personnes.service';
import { Router } from '@angular/router';

@Component({
  selector: 'app-tab-personnes',
  templateUrl: './tab-personnes.component.html',
  styleUrls: ['./tab-personnes.component.css']
})
export class TabPersonnesComponent implements OnInit {
  @Input()
  listePersonnes: Array<Personne>;
  personnesObs$: Observable<Personne[]>;
  // sert pour l'ajout
  ajoutPersonne: Personne;
  // sert pour la modification
  personneMod: Personne;
  currentPersonne: Personne;
  mod: {mailCoEqual: boolean, propModified: boolean};

  // sert a filtrer
  filtre: string;

  // sert pour les erreurs
  erreur: {isError: boolean, message: string} = {isError: false, message: ''};

  constructor(private router: Router, private personneService: PersonnesService, private modalService: NgbModal) { }

  ngOnInit(): void {
    this.filtre = document.querySelector('.active').textContent.toLowerCase();
    this.ajoutPersonne = this.initPersonne();
    this.refreshPersonnes();
  }

  /* fontions pour les personnes */
  refreshPersonnes() {
    // récupère toutes les personnes
    const sub = this.personneService.getAll(this.filtre).subscribe(personnes => {
      this.listePersonnes = personnes;
      sub.unsubscribe();
    });
  }

  ajouterPersonne(modal: any, personne: Personne) {
    if (this.listePersonnes
      .every(p => p.mail_connexion_pers !== personne.mail_connexion_pers)) {
        const sub = this.personneService.ajouter(personne)
        .subscribe(personnes => {
          this.refreshPersonnes();
          sub.unsubscribe();
        });
        modal.close();
        this.ajoutPersonne = this.initPersonne();
        this.erreur = {isError: false, message: ''};
    } else {
      this.erreur = {
            isError: true,
            message: 'Ajout impossible : l\'adresse mail de'
                      + 'connexion est déjà liée à une personne'
          };
    }

  }

  modifierPersonne(modal: any, personne: Personne) {
    this.mod = {mailCoEqual: false, propModified: false};
    this.compareTo(personne, this.currentPersonne);

    if (this.mod.mailCoEqual && !this.mod.propModified) {
          modal.close();
    } else {
      if (this.listePersonnes.every(p => p.mail_connexion_pers !== personne.mail_connexion_pers)
          || this.mod.mailCoEqual && this.mod.propModified) {
        const sub = this.personneService.modifier(personne)
        .subscribe(personnes => {
          this.refreshPersonnes();
          sub.unsubscribe();
        });
        modal.close();
        this.erreur = {isError: false, message: ''};
        this.personneMod = this.initPersonne();
      } else {
        this.erreur = {
          isError: true,
          message: 'Modification impossible : l\'adresse mail de'
                    + 'connexion est déjà liée à une personne'
        };
      }
    }
  }

  deletePersonne(modal: any, id: number) {
    const sub = this.personneService.delete(id)
    .subscribe(data => {
      this.refreshPersonnes();
      sub.unsubscribe();
    });
    modal.close();
  }

  getRolePersonne(personne: Personne) {
    const roles = [];
    if (personne.estContact_pers > 0) { roles.push('Contact'); }
    if (personne.estRecenseur_pers > 0) { roles.push('Recenseur'); }
    if (roles.length < 1) { roles.push('/'); }

    return roles.join(', ');

  }
  /* fonctions pour les personnes */

  /* fonctions pour les modals */
  // affiche modal
  openSmModif(content, object: Personne) {
    // initialise la variable pour préremplir les champs
    this.personneMod = {
      id_pers: object.id_pers,
      nom_pers: object.nom_pers,
      prenom_pers: object.prenom_pers,
      mail_contact_pers: object.mail_contact_pers,
      mail_connexion_pers: object.mail_connexion_pers,
      mdp_pers: '',
      commentaire_pers: object.commentaire_pers,
      estRecenseur_pers: object.estRecenseur_pers,
      estContact_pers: object.estContact_pers,
      institution_courte_pers: object.institution_courte_pers,
      institution_longue_pers: object.institution_longue_pers,
      adr_num_pers: object.adr_num_pers,
      adr_rue_pers: object.adr_rue_pers,
      adr_cp_pers: object.adr_cp_pers,
      adr_ville_pers: object.adr_ville_pers,
      adr_pays_pers: object.adr_pays_pers,
      code_pers: ''
    };

    this.currentPersonne = {
      id_pers: object.id_pers,
      nom_pers: object.nom_pers,
      prenom_pers: object.prenom_pers,
      mail_contact_pers: object.mail_contact_pers,
      mail_connexion_pers: object.mail_connexion_pers,
      mdp_pers: '',
      commentaire_pers: object.commentaire_pers,
      estRecenseur_pers: object.estRecenseur_pers,
      estContact_pers: object.estContact_pers,
      institution_courte_pers: object.institution_courte_pers,
      institution_longue_pers: object.institution_longue_pers,
      adr_num_pers: object.adr_num_pers,
      adr_rue_pers: object.adr_rue_pers,
      adr_cp_pers: object.adr_cp_pers,
      adr_ville_pers: object.adr_ville_pers,
      adr_pays_pers: object.adr_pays_pers,
      code_pers: ''
    };

    this.erreur = {isError: false, message: ''};

    // ouvre le modal
    this.openXl(content);
  }

  openXl(content) {
    // ouvre le modal
    this.modalService.open(content, { size: 'xl' });
  }

  openSm(content) {
    // ouvre le modal
    this.modalService.open(content, { size: 'sm' });
  }

  onCancel(modal: any) {
    // ferme la modal
    modal.close();
    // réinitialise le variable d'erreur
    this.erreur = {isError: false, message: ''};
  }
  /* fonctions pour les modals */

  initPersonne(): Personne {
    return {
      id_pers: 0,
      nom_pers: '',
      prenom_pers: '',
      mail_contact_pers: '',
      mail_connexion_pers: '',
      mdp_pers: '',
      commentaire_pers: '',
      estRecenseur_pers: 0,
      estContact_pers: 0,
      institution_courte_pers: '',
      institution_longue_pers: '',
      adr_num_pers: '',
      adr_rue_pers: '',
      adr_cp_pers: '',
      adr_ville_pers: '',
      adr_pays_pers: '',
      code_pers: ''
    };
  }

  getAjoutButtonText(): string {
    switch (this.filtre) {
      case 'toutes': return 'Ajouter une personne ';
      case 'auteurs': return 'Ajouter un auteur ';
      case 'recenseurs': return 'Ajouter un recenseur ';
      case 'experts': return 'Ajouter un expert ';
      case 'contacts': return 'Ajouter un contact ';
      default: return 'Ajouter une personne ';
    }
  }

  compareTo(p1: Personne, p2: Personne): void {
    if (p1.mail_connexion_pers === p2.mail_connexion_pers) {
      this.mod.mailCoEqual = true;
    }

    for (const prop in p1) {
      if (p1[prop] !== p2[prop]) {
        this.mod.propModified = true;
      }
    }

  }

}
