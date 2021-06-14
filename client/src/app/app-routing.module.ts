import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { RouterModule, Routes } from '@angular/router';
import { AppComponent } from './app.component';
import { DemoComponent } from './pages/demo/demo.component';
import { HomeComponent } from './pages/home/home.component';
import { ManagerLayoutComponent } from './_share/layouts/manager-layout/manager-layout.component';

const ROUTES: Routes = [
  {
    path: "manager",
    component: ManagerLayoutComponent,
    children:[
      {
        path:'',
        loadChildren:()=>import('../app/manager/manager.module').then(m=>m.ManagerModule)
      }
    ]
  },
]

@NgModule({
  declarations: [],
  imports: [
    CommonModule,
    RouterModule.forRoot(ROUTES)
  ],
  exports: [
    RouterModule
  ]
})
export class AppRoutingModule { }
