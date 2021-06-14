import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { RouterModule, Routes } from '@angular/router';
import { ListStationComponent } from './list-station/list-station.component';
import { CreateStationComponent } from './create-station/create-station.component';
import { DetailsStationComponent } from './details-station/details-station.component';
import { DeleteStationComponent } from './delete-station/delete-station.component';
import { EditStationComponent } from './edit-station/edit-station.component';
import { ReactiveFormsModule } from '@angular/forms';

const routes:Routes = [
  {
    path:'',
    component:ListStationComponent
  },
  {
    path:'create',
    component:CreateStationComponent
  },
  {
    path:'details/:id',
    component:DetailsStationComponent
  },
  {
    path:'edit/:id',
    component:EditStationComponent
  },
  {
    path:'delete/:id',
    component:DeleteStationComponent
  }
]

@NgModule({
  declarations: [CreateStationComponent, DetailsStationComponent, DeleteStationComponent, EditStationComponent],
  imports: [
    CommonModule,
    RouterModule.forChild(routes),
    ReactiveFormsModule
  ]
})
export class StationsModule { }
