import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { ScheduleComponent } from './schedule/schedule.component';
import { DetailRouteComponent } from './detail-route/detail-route.component';
import { RouterModule, Routes } from '@angular/router';
import { ReactiveFormsModule } from '@angular/forms';

const routes:Routes = [
  {
    path:'',
    redirectTo: 'profile'
  },
  {
    path: 'profile',
    loadChildren:()=>import('../_share/profile/profile.module').then(m=>m.ProfileModule)
  },
  {
    path: 'schedule',
    component: ScheduleComponent
  },
  {
    path:'schedule/detail-route/:id',
    component: DetailRouteComponent
  }
]

@NgModule({
  declarations: [ScheduleComponent, DetailRouteComponent],
  imports: [
    CommonModule,
    RouterModule.forChild(routes),
    ReactiveFormsModule
  ]
})
export class DriverModule { }
