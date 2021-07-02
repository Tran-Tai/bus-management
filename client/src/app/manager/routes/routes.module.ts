import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { AddDetailsRouteComponent } from './add-details-route/add-details-route.component';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import { RouterModule, Routes } from '@angular/router';
import { CreateRouteComponent } from './create-route/create-route.component';
import { EditRouteComponent } from './edit-route/edit-route.component';
import { DeleteRouteComponent } from './delete-route/delete-route.component';
import { DetailsRouteComponent } from './details-route/details-route.component';
import { ListRouteComponent } from './list-route/list-route.component';
import { MatAutocompleteModule} from '@angular/material/autocomplete';
import { MatInputModule } from '@angular/material/input';

const routes:Routes = [
  {
    path:'',
    component: ListRouteComponent
  },
  {
    path:'create',
    component: CreateRouteComponent
  },
  {
    path :'delete/:id',
    component: DeleteRouteComponent
  },
  {
    path: 'edit/:id',
    component: EditRouteComponent
  },
  {
    path: 'details/:id',
    component: DetailsRouteComponent
  },
  {
    path:'add-details/:id',
    component: AddDetailsRouteComponent
  },


]

@NgModule({
  declarations: [AddDetailsRouteComponent, CreateRouteComponent, EditRouteComponent, DeleteRouteComponent, DetailsRouteComponent, ListRouteComponent],
  imports: [
    CommonModule,
    ReactiveFormsModule,
    RouterModule.forChild(routes),
    FormsModule,
    MatAutocompleteModule,
    MatInputModule
  ]
})
export class RoutesModule { }
