import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { LoginFormComponent } from './login-form/login-form.component';
import { AdminHomeComponent } from './admin-home/admin-home.component';
import { GestioHomeComponent } from './gestio-home/gestio-home.component';
import { AuthorHomeComponent } from './author-home/author-home.component';
import { PageNotFoundComponent } from './page-not-found/page-not-found.component';


const appRoutes: Routes = [
  { path: 'connexion',  component: LoginFormComponent},
  { path: 'admin', component: AdminHomeComponent},
  { path: 'gestio', component: GestioHomeComponent},
  { path: 'auteur', component: AuthorHomeComponent},
  { path: '', redirectTo: 'connexion', pathMatch: 'full'},
  { path: '**', component: PageNotFoundComponent},
];

@NgModule({
  imports: [RouterModule.forRoot(appRoutes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
