import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { DetailStaffComponent } from './detail-staff/detail-staff.component';
import { EditStaffComponent } from './edit-staff/edit-staff.component';
import { ChangePasswordComponent } from './change-password/change-password.component';
import { RouterModule, Routes } from '@angular/router';
import { ReactiveFormsModule } from '@angular/forms';

const routes : Routes =[
  {
    path:'',
    component: DetailStaffComponent
  },
  {
    path:'change-password',
    component: ChangePasswordComponent
  },
  {
    path:'edit-information',
    component: EditStaffComponent
  }
]

@NgModule({
  declarations: [DetailStaffComponent, EditStaffComponent, ChangePasswordComponent],
  imports: [
    CommonModule,
    RouterModule.forChild(routes),
    ReactiveFormsModule
  ]
})
export class ProfileModule { }
