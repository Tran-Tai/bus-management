import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { RouterModule, Routes } from '@angular/router';
import { ListStationComponent } from './stations/list-station/list-station.component';
import { DetailTripComponent } from './operations/detail-trip/detail-trip.component';
import { ListRouteComponent } from './operations/list-route/list-route.component';
import { ListRouteDayComponent } from './operations/list-route-day/list-route-day.component';
import { ListTripComponent } from './operations/list-trip/list-trip.component';

const routes:Routes =[
  {
    path:'',
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
  },
  {
    path:'operations',
    loadChildren:()=>import('./operations/operations.module').then(m=>m.OperationsModule)
  }
];

@NgModule({
  declarations: [],
  imports: [
    CommonModule,
    RouterModule.forChild(routes)

  ]
})
export class ManagerModule { }
