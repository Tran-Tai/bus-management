import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { CreateBusComponent } from './create-bus/create-bus.component';
import { DetailsBusComponent } from './details-bus/details-bus.component';
import { EditBusComponent } from './edit-bus/edit-bus.component';
import { DeleteBusComponent } from './delete-bus/delete-bus.component';
import { ListBusComponent } from './list-bus/list-bus.component';
import { RouterModule, Routes } from '@angular/router';
import { ReactiveFormsModule } from '@angular/forms';

const routes:Routes = [
  {
    path:'',
    component: ListBusComponent
  },
  {
    path:'create',
    component: CreateBusComponent
  },
  {
    path:'edit/:id',
    component: EditBusComponent
  },
  {
    path: 'details/:id',
    component: DetailsBusComponent
  },
  {
    path: 'delete/:id',
    component: DeleteBusComponent
  }
]

@NgModule({
  declarations: [CreateBusComponent, DetailsBusComponent, EditBusComponent, DeleteBusComponent, ListBusComponent],
  imports: [
    CommonModule,
    ReactiveFormsModule,
    RouterModule.forChild(routes)
  ]
})
export class BusesModule { }
