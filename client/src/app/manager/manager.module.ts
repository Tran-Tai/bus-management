import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { RouterModule, Routes } from '@angular/router';
import { ListStationComponent } from './stations/list-station/list-station.component';

const routes:Routes =[
  {
    path:'',
    redirectTo:'profile'
  },
  {
    path:'profile',
    loadChildren:()=>import('../_share/profile/profile.module').then(m=>m.ProfileModule)
  },
  {
    path:'stations',
    loadChildren:()=>import('./stations/stations.module').then(m=>m.StationsModule)
  },
  {
    path:'staffs',
    loadChildren:()=>import('./staffs/staffs.module').then(m=>m.StaffsModule)
  },
  {
    path:'buses',
    loadChildren:()=>import('./buses/buses.module').then(m=>m.BusesModule)
  },
  {
    path:'routes',
    loadChildren:()=>import('./routes/routes.module').then(m=>m.RoutesModule)
  }
];

@NgModule({
  declarations: [ListStationComponent],
  imports: [
    CommonModule,
    RouterModule.forChild(routes)

  ]
})
export class ManagerModule { }
