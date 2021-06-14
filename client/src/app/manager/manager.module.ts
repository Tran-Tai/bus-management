import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { ChangePasswordComponent } from './staff_profile/change-password/change-password.component';
import { DetailStaffComponent } from './staff_profile/detail-staff/detail-staff.component';
import { EditStaffComponent } from './staff_profile/edit-staff/edit-staff.component';
import { RouterModule, Routes } from '@angular/router';
import { ListRouteComponent } from './operation/list-route/list-route.component';
import { ListTripComponent } from './operation/list-trip/list-trip.component';
import { CreateRouteComponent } from './operation/create-route/create-route.component';
import { DetailTripComponent } from './operation/detail-trip/detail-trip.component';

const ROUTES: Routes = [
  {
    path: 'staff_profile/detail-staff',
    component: DetailStaffComponent
  },
  {
    path: 'staff_profile/edit-staff',
    component: EditStaffComponent
  },
  {
    path:'staff_profile/change-password',
    component: ChangePasswordComponent
  },
  {
    path: 'operation/create-route',
    component: CreateRouteComponent
  },
  {
    path: 'operation/detail-trip',
    component: DetailTripComponent
  },
  {
    path: 'operation/list-route',
    component: ListRouteComponent
  },
  {
    path: 'operation/list-trip',
    component: ListTripComponent
  }

]

@NgModule({
  declarations: [ChangePasswordComponent, DetailStaffComponent, EditStaffComponent, ListRouteComponent, ListTripComponent, CreateRouteComponent, DetailTripComponent],
  imports: [
    CommonModule,
    RouterModule.forChild(ROUTES)
  ]
})
export class ManagerModule { }
