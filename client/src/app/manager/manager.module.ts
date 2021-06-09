import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { ListBusesComponent } from './list-buses/list-buses.component';
import { EditBusesComponent } from './edit-buses/edit-buses.component';
import { CreateBusesComponent } from './create-buses/create-buses.component';



@NgModule({
  declarations: [ListBusesComponent, EditBusesComponent, CreateBusesComponent],
  imports: [
    CommonModule
  ]
})
export class ManagerModule { }
