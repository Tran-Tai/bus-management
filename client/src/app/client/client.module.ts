import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { RouterModule, Routes } from '@angular/router';
import { HomepageComponent } from './homepage/homepage.component';
import { ResultComponent } from './result/result.component';
import { ReactiveFormsModule } from '@angular/forms';
import { MatAutocompleteModule} from '@angular/material/autocomplete';
import { MatInputModule } from '@angular/material/input';
import { StationComponent } from './station/station.component';
import { RoutesComponent } from './routes/routes.component';

const routes:Routes = [
  {
    path:'',
    component: HomepageComponent
  },
  {
    path:'result',
    component: ResultComponent
  },
  {
    path:'station',
    component: StationComponent
  },
  {
    path:'route',
    component: RoutesComponent
  }
]

@NgModule({
  declarations: [HomepageComponent, ResultComponent, StationComponent, RoutesComponent],
  imports: [
    CommonModule,
    RouterModule.forChild(routes),
    ReactiveFormsModule,
    MatAutocompleteModule,
    MatInputModule
  ]
})
export class ClientModule { }
