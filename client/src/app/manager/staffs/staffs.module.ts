import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { ListStaffComponent } from './list-staff/list-staff.component';
import { CreateStaffComponent } from './create-staff/create-staff.component';
import { DetailsStaffComponent } from './details-staff/details-staff.component';
import { EditStaffComponent } from './edit-staff/edit-staff.component';
import { DeleteStaffComponent } from './delete-staff/delete-staff.component';
import { RouterModule, Routes } from '@angular/router';
import { ReactiveFormsModule } from '@angular/forms';

const routes:Routes = [
  {
    path:'',
    component: ListStaffComponent
  },
  {
    path:'create',
    component: CreateStaffComponent
  },
  {
    path:'details/:id',
    component: DetailsStaffComponent
  },
  {
    path:'edit/:id',
    component: EditStaffComponent
  },
  {
    path:'delete/:id',
    component: DeleteStaffComponent
  }
]

@NgModule({
  declarations: [ListStaffComponent, CreateStaffComponent, DetailsStaffComponent, EditStaffComponent, DeleteStaffComponent],
  imports: [
    CommonModule,
    RouterModule.forChild(routes),
    ReactiveFormsModule
  ]
})
export class StaffsModule { }
