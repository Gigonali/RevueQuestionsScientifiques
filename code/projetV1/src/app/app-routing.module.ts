import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
// components
import { LoginFormComponent } from './login-form/login-form.component';
import { AdminHomeComponent } from './admin-home/admin-home.component';
import { GestioHomeComponent } from './gestio-home/gestio-home.component';
import { AuthorHomeComponent } from './author-home/author-home.component';
import { PageNotFoundComponent } from './page-not-found/page-not-found.component';
import { ReinitialitionMdpComponent } from './reinitialition-mdp/reinitialition-mdp.component';
// guards
import { AdministrateurGuard } from './guards/administrateur.guard';
import { GestionnaireGuard } from './guards/gestionnaire.guard';
import { AuteurGuard } from './guards/auteur.guard';


const appRoutes: Routes = [
  { path: 'connexion',  component: LoginFormComponent},
  { path: 'admin', component: AdminHomeComponent/*, canActivate: [AdministrateurGuard] */},
  { path: 'gestio', component: GestioHomeComponent/* , canActivate: [GestionnaireGuard] */},
  { path: 'auteur', component: AuthorHomeComponent/* , canActivate: [AuteurGuard] */},
  { path: '', redirectTo: 'connexion', pathMatch: 'full'},
  { path: 'reinitialisation', component: ReinitialitionMdpComponent},
  { path: 'reinitialisation/:email/:code', component: ReinitialitionMdpComponent},
  { path: '**', component: PageNotFoundComponent},
];

@NgModule({
  imports: [RouterModule.forRoot(appRoutes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
