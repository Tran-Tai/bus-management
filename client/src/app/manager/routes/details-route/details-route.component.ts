import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { ActivatedRoute, Router } from '@angular/router';
import { Route } from 'src/app/_share/models/route.model';
import { RouteService } from '../route.service';

@Component({
  selector: 'app-details-route',
  templateUrl: './details-route.component.html',
  styleUrls: ['./details-route.component.scss']
})
export class DetailsRouteComponent implements OnInit {

  routes:Route;
  detailFormRoute:FormGroup

  constructor(
    private formBuilder:FormBuilder,
    private routeService:RouteService,
    private router:ActivatedRoute
  ) { }

  ngOnInit(): void {
    const id = this.router.snapshot.paramMap.get('id');
    this.routeService.getRoute(id).subscribe(res=>this.routes = res);
    this.initForm();
    this.routeService.getRoute(id).subscribe(res=>this.pathRouteFormValue(res));
  }

  initForm(){
    this.detailFormRoute = this.formBuilder.group({
      name:['',[Validators.required]],
      number:['',[Validators.required]],
      time_interval:['',Validators.required]
    })
  }

  pathRouteFormValue(route:Route){
    this.detailFormRoute.patchValue({
      name : route.name,
      number  : route.number,
      time_interval : route.time_interval
    })
  }
}
