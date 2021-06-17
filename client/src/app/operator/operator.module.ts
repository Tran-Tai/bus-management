import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { RouterModule, Routes } from '@angular/router';
import { ScheduleComponent } from './schedule/schedule.component';
import { CreateTripsComponent } from './create-trips/create-trips.component';
import { TripDetailComponent } from './trip-detail/trip-detail.component';
import { TripListComponent } from './trip-list/trip-list.component';
import { TripCancelComponent } from './trip-cancel/trip-cancel.component';
import { ReactiveFormsModule } from '@angular/forms';

const ROUTES:Routes = [
  {
    path:'',
    loadChildren:()=>import('../_share/profile/profile.module').then(m=>m.ProfileModule)
  },
  {
    path:'schedule',
    component: ScheduleComponent
  },
  {
    path:'details/:id',
    component: CreateTripsComponent
  },
  {
    path:'trip-details/:id',
    component: TripDetailComponent
  },
  {
    path:'trip-list/:id/:date',
    component: TripListComponent
  },
  {
    path:'trip-cancel/:id',
    component: TripCancelComponent
  }
]

@NgModule({
  declarations: [ ScheduleComponent, CreateTripsComponent, TripCancelComponent, TripDetailComponent, TripListComponent],
  imports: [
    CommonModule,
    ReactiveFormsModule,
    RouterModule.forChild(ROUTES)
  ]
})
export class OperatorModule { }
