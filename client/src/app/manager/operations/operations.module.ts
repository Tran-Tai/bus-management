import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { RouterModule, Routes } from '@angular/router';
import { ListRouteComponent } from './list-route/list-route.component';
import { DetailTripComponent } from './detail-trip/detail-trip.component';
import { ListRouteDayComponent } from './list-route-day/list-route-day.component';
import { ListTripComponent } from './list-trip/list-trip.component';
import { ReactiveFormsModule } from '@angular/forms';

const routes:Routes = [
  {
    path:'',
    component: ListRouteComponent
  },
  {
    path:'detail-trip',
    component: DetailTripComponent
  },
  {
    path:'list-route-day',
    component: ListRouteDayComponent
  },
  {
    path:'list-route',
    component: ListRouteComponent
  },
  {
    path:'list-trip',
    component: ListTripComponent
  }

]

@NgModule({
  declarations: [DetailTripComponent, ListRouteDayComponent, ListRouteComponent, ListTripComponent],
  imports: [
    CommonModule,
    RouterModule.forChild(routes),
    ReactiveFormsModule
  ]
})
export class OperationsModule { }
