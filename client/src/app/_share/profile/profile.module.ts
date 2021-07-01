import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { ChangePasswordComponent } from './change-password/change-password.component';
import { ProfileComponent } from './profile/profile.component';
import { ChangeInformationComponent } from './change-information/change-information.component';
import { ReactiveFormsModule } from '@angular/forms';
import { RouterModule, Routes } from '@angular/router';

const ROUTES:Routes = [
  {
    path:'',
    component: ProfileComponent
  },
  {
    path:'change-password',
    component: ChangePasswordComponent
  },
  {
    path:'edit-information',
    component: ChangeInformationComponent
  }
]

@NgModule({
  declarations: [ChangePasswordComponent, ProfileComponent, ChangeInformationComponent],
  imports: [
    CommonModule,
    ReactiveFormsModule,
    RouterModule.forChild(ROUTES)
  ]
})
export class ProfileModule { }
