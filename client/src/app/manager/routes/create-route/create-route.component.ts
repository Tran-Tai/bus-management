import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { Title } from '@angular/platform-browser';
import { RouteService } from '../route.service';

@Component({
  selector: 'app-create-route',
  templateUrl: './create-route.component.html',
  styleUrls: ['./create-route.component.scss']
})
export class CreateRouteComponent implements OnInit {

  createRouteForm:FormGroup;
  message:string;

  constructor(
    private title:Title,
    private formBuilder:FormBuilder,
    private routeService:RouteService
  ) {
    this.title.setTitle('Thêm tuyến mới')
  }

  ngOnInit(): void {
    this.createRouteForm = this.formBuilder.group({
      name:['',Validators.required],
      number:['',Validators.required]
    })
  }

  addRoute(){
    if(this.createRouteForm.invalid){
      return this.message = "Vui lòng điền đầy đủ thông tin"
    }

    const {value} = this.createRouteForm;

    this.routeService.addRoute(value).subscribe(
      res => {
        this.message = "Thêm trạm mới thành công";
        console.log(this.message);
      },
      err =>{
        this.message = "Thêm trạm không thành công, vui lòng thử lại";
        console.log(this.message);
      }
    )
  }

}
