import { Component, OnInit } from '@angular/core';
import { Routes } from '@angular/router';
import { ClientService } from '../client.service';

@Component({
  selector: 'app-routes',
  templateUrl: './routes.component.html',
  styleUrls: ['./routes.component.scss']
})
export class RoutesComponent implements OnInit {

  routes : Array<Routes> = [];

  constructor(
    private clientService:ClientService
  ) { }

  ngOnInit(): void {
    this.loadRoute();
  }

  loadRoute():void{
    this.clientService.getListRoute().subscribe(res => this.routes = res)
  }
}
