import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { ScheduleComponent } from './schedule/schedule.component';
import { DetailTripComponent } from './detail-trip/detail-trip.component';
import { DetailStationComponent } from './detail-station/detail-station.component';




@NgModule({
  declarations: [ScheduleComponent, DetailTripComponent, DetailStationComponent],
  imports: [
    CommonModule
  ]
})
export class TicketCollectorModule { }
