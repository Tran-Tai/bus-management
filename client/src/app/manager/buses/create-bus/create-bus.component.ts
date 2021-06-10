import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { Title } from '@angular/platform-browser';
import { BusesService } from '../buses.service';

@Component({
  selector: 'app-create-bus',
  templateUrl: './create-bus.component.html',
  styleUrls: ['./create-bus.component.scss']
})
export class CreateBusComponent implements OnInit {

  createBusForm:FormGroup;
  message : string;

  constructor(
    private busService:BusesService,
    private formBuilder:FormBuilder,
    private title:Title
  ) {
    this.title.setTitle('Thêm mới xe buýt')
  }

  ngOnInit(): void {
    this.createBusForm = this.formBuilder.group(
      {
        number : ['',Validators.required],
        seat : ['', Validators.required],
        capacity : ['' , Validators.required]
      }
    )
  }

  addBus(){
    if(this.createBusForm.invalid){
       this.message = "Vui lòng điền đầy đủ thông tin";
       return console.log(this.message);
    }

    const {value} = this.createBusForm;

    this.busService.addBus(value).subscribe(
      res => {
        this.message = "Thêm xe mới thành công";
        console.log(this.message);
      },
      err =>{
        this.message = "Thêm xe mới không thành công, vui lòng thử lại";
        console.log(this.message);
      }
    )
  }

}
