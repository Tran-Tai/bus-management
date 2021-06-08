import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { RouterModule, Routes } from '@angular/router';
import { ListStationComponent } from './stations/list-station/list-station.component';

const routes:Routes =[
  {
    path:'stations',
    loadChildren:()=>import('./stations/stations.module').then(m=>m.StationsModule)
  },
  {
    path:'staffs',
    loadChildren:()=>import('./staffs/staffs.module').then(m=>m.StaffsModule)
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
