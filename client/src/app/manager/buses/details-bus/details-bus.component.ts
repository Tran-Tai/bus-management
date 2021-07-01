import { Route } from 'src/app/_share/models/route.model';
import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { Title } from '@angular/platform-browser';
import { ActivatedRoute } from '@angular/router';
import { Bus } from 'src/app/_share/models/bus.model';
import { DataBus } from 'src/app/_share/models/dataBus.model';
import { BusesService } from '../buses.service';

@Component({
  selector: 'app-details-bus',
  templateUrl: './details-bus.component.html',
  styleUrls: ['./details-bus.component.scss']
})
export class DetailsBusComponent implements OnInit {

  data:DataBus;
  detailsBusForm:FormGroup;
  bus : Bus;
  routes : Array<Route>;


  constructor(
    private title:Title,
    private router:ActivatedRoute,
    private busService:BusesService,
    private formBuilder:FormBuilder
  ) {
    this.title.setTitle('Chỉnh sửa thông tin xe')
  }

  ngOnInit(): void {
    const id = this.router.snapshot.paramMap.get('id');
    this.busService.getRoute().subscribe(res => this.routes = res);
    this.busService.getBus(id).subscribe(res=> this.initData(res));
    this.initForm();
    this.busService.getBus(id).subscribe(res=>this.pathBusFormValue(res.bus));
  }

  initData(res){
    this.data = res;
    this.bus = this.data.bus;
  }

  initForm(){
    this.detailsBusForm = this.formBuilder.group({
      number:['',[Validators.required]],
      seat:['',[Validators.required]],
      capacity:['',Validators.required],
      route_name_id : ['',Validators.required]
    })
  }

  pathBusFormValue(bus:Bus){
    this.detailsBusForm.patchValue({
      number : bus.number,
      seat  : bus.seat,
      capacity : bus.capacity,
      route_name_id: bus.route_name_id
    })
  }

}
