import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { Routes, RouterModule } from '@angular/router';
import {HomeComponent} from "./home/home.component";
import {AproposComponent} from "./apropos/apropos.component";
import {NotFoundComponent} from "./not-found/not-found.component";

export const appRouteList: Routes = [
  {
    path: 'accueil',
    component: HomeComponent
  },
  {
    path: '',
    component: HomeComponent
  },
  {
    path: 'A-propos',
    component: AproposComponent
  },
  { path: '**', component: NotFoundComponent }
];

@NgModule({
  imports: [RouterModule.forRoot(appRouteList)],
  exports: [RouterModule],
  declarations: []
})
export class AppRoutingModule { }
