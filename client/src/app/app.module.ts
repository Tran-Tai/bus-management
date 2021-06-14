import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';

import { AppComponent } from './app.component';
import { AppRoutingModule } from './app-routing.module';
import { DemoComponent } from './pages/demo/demo.component';
import { HomeComponent } from './pages/home/home.component';
import { HttpClientModule } from '@angular/common/http';
import { ManagerLayoutComponent } from './_share/layouts/manager-layout/manager-layout.component';


@NgModule({
  declarations: [
    AppComponent,
    DemoComponent,
    HomeComponent,
    ManagerLayoutComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    HttpClientModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
