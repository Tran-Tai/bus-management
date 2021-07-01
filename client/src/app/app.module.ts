import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';

import { AppComponent } from './app.component';
import { AppRoutingModule } from './app-routing.module';
import { DemoComponent } from './pages/demo/demo.component';
import { HomeComponent } from './pages/home/home.component';
import { HttpClientModule, HTTP_INTERCEPTORS } from '@angular/common/http';
import { ManagerLayoutComponent } from './_share/layouts/manager-layout/manager-layout.component';
import { ClientLayoutComponent } from './_share/layouts/client-layout/client-layout.component';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations';
import { ReactiveFormsModule } from '@angular/forms';
import { ApiInterceptor } from './_share/services/interceptors/api.interceptor';



@NgModule({
  declarations: [
    AppComponent,
    DemoComponent,
    HomeComponent,
    ManagerLayoutComponent,
    ClientLayoutComponent,
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    HttpClientModule,
    BrowserAnimationsModule,
    ReactiveFormsModule
  ],
  providers: [{ provide:HTTP_INTERCEPTORS, useClass: ApiInterceptor, multi:true}],
  bootstrap: [AppComponent]
})
export class AppModule { }
