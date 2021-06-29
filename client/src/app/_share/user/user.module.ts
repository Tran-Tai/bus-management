import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { RegistrationComponent } from './registration/registration.component';
import { LoginComponent } from './login/login.component';
import { ChangeInformationComponent } from './change-information/change-information.component';
import { ReactiveFormsModule } from '@angular/forms';
import { RouterModule, Routes } from '@angular/router';
import { ChangePasswordComponent } from './change-password/change-password.component';

const ROUTES:Routes = [
  {
    path:'',
    component: LoginComponent
  },
  {
    path:'registration',
    component: RegistrationComponent
  },
  {
    path:'change-information',
    component: ChangeInformationComponent
  },
  {
    path:'change-password',
    component: ChangePasswordComponent
  }
]

@NgModule({
  declarations: [RegistrationComponent, LoginComponent, ChangeInformationComponent, ChangePasswordComponent],
  imports: [
    CommonModule,
    ReactiveFormsModule,
    RouterModule.forChild(ROUTES)
  ]
})
export class UserModule { }
