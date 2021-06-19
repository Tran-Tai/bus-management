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
    redirectTo:'profile'
  },
  {
    path:'profile',
    loadChildren:()=>import('../_share/profile/profile.module').then(m=>m.ProfileModule)
  },
  {
    path:'schedule',
    component: ScheduleComponent
  },
  {
    path:'schedule/details/:id',
    component: CreateTripsComponent
  },
  {
    path:'schedule/trip-details/:id',
    component: TripDetailComponent
  },
  {
    path:'schedule/trip-list/:id/:date',
    component: TripListComponent
  },
  {
    path:'schedule/trip-cancel/:id',
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
