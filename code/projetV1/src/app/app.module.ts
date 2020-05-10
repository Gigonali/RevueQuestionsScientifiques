import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import {NgbModule} from '@ng-bootstrap/ng-bootstrap';
import { FormsModule } from '@angular/forms';
import { HttpClientModule } from '@angular/common/http';
import { AppRoutingModule } from './app-routing.module';

// Components
import { AppComponent } from './app.component';
import { CarouselComponent } from './carousel/carousel.component';
import { LoginFormComponent } from './login-form/login-form.component';
import { AdminHomeComponent } from './admin-home/admin-home.component';
import { GestioHomeComponent } from './gestio-home/gestio-home.component';
import { AuthorHomeComponent } from './author-home/author-home.component';
import { EcheanceListComponent } from './echeance-list/echeance-list.component';
import { TabRechercheComponent } from './tab-recherche/tab-recherche.component';
import { TabNouveauprojetComponent } from './tab-nouveauprojet/tab-nouveauprojet.component';
import { TabNouveaucompterenduComponent } from './tab-nouveaucompterendu/tab-nouveaucompterendu.component';
import { TabArticlesComponent } from './tab-articles/tab-articles.component';
import { TabAnalysescritiqueComponent } from './tab-analysescritique/tab-analysescritique.component';
import { TabComptesrendusComponent } from './tab-comptesrendus/tab-comptesrendus.component';
import { TabDiversComponent } from './tab-divers/tab-divers.component';
import { TabSpecialhelhaComponent } from './tab-specialhelha/tab-specialhelha.component';
import { TabLivresComponent } from './tab-livres/tab-livres.component';
import { TabPersonnesComponent } from './tab-personnes/tab-personnes.component';
import { TabEditeursComponent } from './tab-editeurs/tab-editeurs.component';
import { TabPersonnalisationComponent } from './tab-personnalisation/tab-personnalisation.component';
import { TabMessagesautomatiqueComponent } from './tab-messagesautomatique/tab-messagesautomatique.component';

import { TabParametredeconnexionComponent } from './tab-parametredeconnexion/tab-parametredeconnexion.component';
import { AccueilAdminGestioComponent } from './accueil-admin-gestio/accueil-admin-gestio.component';
import { PageNotFoundComponent } from './page-not-found/page-not-found.component';
import { TabRevueComponent } from './tab-revue/tab-revue.component';
import { TabDomainesComponent } from './tab-domaines/tab-domaines.component';

// Services
import { PersonnesService } from './services/personnes.service';
import { RevueService } from './services/revue.service';
import { AuthentificationService } from './services/authentification.service';
import { ReinitialitionMdpComponent } from './reinitialition-mdp/reinitialition-mdp.component';
import { ReinitialisationService } from './services/reinitialisation.service';
import { DomaineService } from './services/domaine.service';
import { TabMaintenanceComponent } from './tab-maintenance/tab-maintenance.component';

import { MaintenanceService } from './services/maintenance.service';
import { DateCustomPipe } from './pipes/date-custom.pipe';



@NgModule({
  declarations: [
    AppComponent,
    CarouselComponent,
    LoginFormComponent,
    AdminHomeComponent,
    GestioHomeComponent,
    AuthorHomeComponent,
    EcheanceListComponent,
    TabRechercheComponent,
    TabNouveauprojetComponent,
    TabNouveaucompterenduComponent,
    TabArticlesComponent,
    TabAnalysescritiqueComponent,
    TabComptesrendusComponent,
    TabDiversComponent,
    TabSpecialhelhaComponent,
    TabLivresComponent,
    TabPersonnesComponent,
    TabEditeursComponent,
    TabPersonnalisationComponent,
    TabMessagesautomatiqueComponent,
    TabMaintenanceComponent,
    TabParametredeconnexionComponent,
    AccueilAdminGestioComponent,
    PageNotFoundComponent,
    TabRevueComponent,
    TabDomainesComponent,
    ReinitialitionMdpComponent,
    DateCustomPipe
  ],
  imports: [
    BrowserModule,
    NgbModule,
    FormsModule,
    AppRoutingModule,
    HttpClientModule,
  ],
  providers: [
    PersonnesService,
    RevueService,
    AuthentificationService,
    ReinitialisationService,
    DomaineService,
    MaintenanceService

  ],
  bootstrap: [AppComponent]
})
export class AppModule { }
