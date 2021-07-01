import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { UserInformationComponent } from './user-information/user-information.component';
import { BuyTicketComponent } from './buy-ticket/buy-ticket.component';
import { RouterModule, Routes } from '@angular/router';
import { BookTicketComponent } from './book-ticket/book-ticket.component';
import { CodeVerificationComponent } from './code-verification/code-verification.component';
import { ReactiveFormsModule } from '@angular/forms';

const routes:Routes =[
  {
    path:'',
    redirectTo: 'user-information'
  },
  {
    path:'user-information',
    loadChildren:()=>import('../ticket/ticket.module').then(m=>m.TicketModule)
  },
  {
    path:'book-ticket',
    component:BookTicketComponent
  },
  {
    path:'buy-ticket',
    component:BuyTicketComponent
  },
  {
    path:'code-verification',
    component:CodeVerificationComponent
  }
]

@NgModule({
  declarations: [UserInformationComponent, BuyTicketComponent, BookTicketComponent, CodeVerificationComponent],
  imports: [
    CommonModule,
    RouterModule.forChild(routes),
    ReactiveFormsModule
  ]
})
export class TicketModule { }
