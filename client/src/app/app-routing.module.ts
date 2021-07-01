import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { RouterModule, Routes } from '@angular/router';
import { ManagerLayoutComponent } from './_share/layouts/manager-layout/manager-layout.component';
import { ClientLayoutComponent } from './_share/layouts/client-layout/client-layout.component';
import { LoginComponent } from './_share/login/login.component';

const ROUTES: Routes = [
  {
    path:"login",
    component: LoginComponent
  },
  {
    path:"",
    component: ClientLayoutComponent,
    children:[
      {
        path:"",
        loadChildren:()=>import('./client/client.module').then(m=>m.ClientModule)
      }
    ]
  },
  {
    path: "manager",
    component: ManagerLayoutComponent,
    children:[
      {
        path:'',
        loadChildren:()=>import('./manager/manager.module').then(m=>m.ManagerModule)
      }
    ]
  },
  {
    path: "operator",
    component: ManagerLayoutComponent,
    children:[
      {
        path:'',
        loadChildren:()=>import('./operator/operator.module').then(m=>m.OperatorModule)
      }
    ]
  },
  {
    path: "driver",
    component: ManagerLayoutComponent,
    children:[
      {
        path:'',
        loadChildren:()=>import('./driver/driver.module').then(m=>m.DriverModule)
      }
    ]
  }
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
