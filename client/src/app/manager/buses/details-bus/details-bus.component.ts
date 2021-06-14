import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { Title } from '@angular/platform-browser';
import { ActivatedRoute } from '@angular/router';
import { Bus } from 'src/app/_share/models/bus.model';
import { BusesService } from '../buses.service';

@Component({
  selector: 'app-details-bus',
  templateUrl: './details-bus.component.html',
  styleUrls: ['./details-bus.component.scss']
})
export class DetailsBusComponent implements OnInit {

  bus:Bus
  detailsBusForm:FormGroup;

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
    this.busService.getBus(id).subscribe(res=>this.bus = res);
    this.initForm();
    this.busService.getBus(id).subscribe(res=>this.pathBusFormValue(res));

  }

  initForm(){
    this.detailsBusForm = this.formBuilder.group({
      number:['',[Validators.required]],
      seat:['',[Validators.required]],
      capacity:['',Validators.required]
    })
  }

  pathBusFormValue(bus:Bus){
    this.detailsBusForm.patchValue({
      number : bus.number,
      seat  : bus.seat,
      capacity : bus.capacity
    })
  }

}
