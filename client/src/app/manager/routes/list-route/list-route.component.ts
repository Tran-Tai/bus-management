import { Component, OnInit } from '@angular/core';
import { Title } from '@angular/platform-browser';
import { Route } from 'src/app/_share/models/route.model';
import { RouteService } from '../route.service';

@Component({
  selector: 'app-list-route',
  templateUrl: './list-route.component.html',
  styleUrls: ['./list-route.component.scss']
})
export class ListRouteComponent implements OnInit {

  routes: Array<Route> =[]

  constructor(
    private routeService:RouteService,
    private title:Title
  ) {
    this.title.setTitle('Danh sách tuyến')
  }

  ngOnInit(): void {
    this.loadRoute();

  }

  loadRoute():void{
    this.routeService.getList().subscribe(res=>this.routes = res);
  }

}
