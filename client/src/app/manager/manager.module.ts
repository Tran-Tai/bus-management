import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { ChangePasswordComponent } from './staff_profile/change-password/change-password.component';
import { DetailStaffComponent } from './staff_profile/detail-staff/detail-staff.component';
import { EditStaffComponent } from './staff_profile/edit-staff/edit-staff.component';
import { RouterModule, Routes } from '@angular/router';

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
  }
]

@NgModule({
  declarations: [ChangePasswordComponent, DetailStaffComponent, EditStaffComponent],
  imports: [
    CommonModule,
    RouterModule.forChild(ROUTES)
  ]
})
export class ManagerModule { }
