import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { Title } from '@angular/platform-browser';
import { ActivatedRoute } from '@angular/router';
import { Bus } from 'src/app/_share/models/bus.model';
import { DataBus } from 'src/app/_share/models/dataBus.model';
import { Route } from 'src/app/_share/models/route.model';
import { BusesService } from '../buses.service';

@Component({
  selector: 'app-edit-bus',
  templateUrl: './edit-bus.component.html',
  styleUrls: ['./edit-bus.component.scss']
})
export class EditBusComponent implements OnInit {

  data:DataBus;
  bus:Bus;
  editBusForm:FormGroup;
  message:string = '';
  routes : Array<Route>;

  constructor(
    private title:Title,
    private busService:BusesService,
    private router:ActivatedRoute,
    private formBuilder:FormBuilder
  ) {
    this.title.setTitle('Chỉnh sửa thông tin xe')
   }

  ngOnInit(): void {
    const id = this.router.snapshot.paramMap.get('id');
    this.busService.getRoute().subscribe(res=>this.routes = res);
    this.busService.getBus(id).subscribe(res=>this.initData(res));
    this.initForm();
    this.busService.getBus(id).subscribe(res=>this.pathBusFormValue(res.bus));
  }

  initData(res){
    this.data = res;
    this.bus = this.data.bus
  }

  initForm(){
    this.editBusForm = this.formBuilder.group({
      number:         ['',Validators.required],
      seat:           ['',Validators.required],
      capacity:       ['',Validators.required],
      route_name_id : ['', Validators.required]
    })
  }

  pathBusFormValue(bus:Bus){
    this.editBusForm.patchValue({
      number : bus.number,
      seat  : bus.seat,
      capacity : bus.capacity,
      route_name_id : bus.route_name_id
    })
  }

  updateBus(){
    if(this.editBusForm.invalid){
      return this.message = "Vui lòng kiểm tra lại thông tin";
    }


    const {value} = this.editBusForm;

    const id = this.router.snapshot.paramMap.get('id');

    this.busService.updateBus(id,value).subscribe(
      res => {
        this.message = "Sửa thông tin xe thành công";
        console.log(this.message);
      },
      err=>{
        this.message = "Sửa thông tin xe không thành công, vui lòng thử lại!";
        console.log(this.message);
      }
    )
  }
}
