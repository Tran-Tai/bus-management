import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { ScheduleComponent } from './schedule/schedule.component';
import { DetailTripComponent } from './detail-trip/detail-trip.component';
import { DetailStationComponent } from './detail-station/detail-station.component';
import { RouterModule, Routes } from '@angular/router';

const routes:Routes = [
  {
    path:'',
    redirectTo:'schedule'
  },
  {
    path:'schedule',
    component: ScheduleComponent
  },
  {
    path:'detail-trip',
    component: DetailTripComponent
  },
  {
    path:'detail-station',
    component: DetailStationComponent
  }
]


@NgModule({
  declarations: [ScheduleComponent, DetailTripComponent, DetailStationComponent],
  imports: [
    CommonModule,
    RouterModule.forChild(routes),
  ]
})
export class TicketCollectorModule { }
