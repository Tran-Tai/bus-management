import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { ActivatedRoute, Router } from '@angular/router';
import { Route } from 'src/app/_share/models/route.model';
import { RouteService } from '../route.service';

@Component({
  selector: 'app-edit-route',
  templateUrl: './edit-route.component.html',
  styleUrls: ['./edit-route.component.scss']
})
export class EditRouteComponent implements OnInit {

  editRouteForm:FormGroup;
  routes:Route;
  message:string;

  constructor(
    private routeService:RouteService,
    private router:ActivatedRoute,
    private formBuilder:FormBuilder,
    private router2:Router
  ) { }

  ngOnInit(): void {
    const id = this.router.snapshot.paramMap.get('id');
    this.routeService.getRoute(id).subscribe(res=>this.pathRouteFormValue(res.route) );
    this.initForm();
    // this.routeService.getRoute(id).subscribe(res=>this.pathRouteFormValue(res));
  }

  initForm(){
    this.editRouteForm = this.formBuilder.group({
      name:['',[Validators.required]],
      number:['',[Validators.required]],
      time_interval:['',Validators.required]
    })
  }

  pathRouteFormValue(route:Route){
    this.editRouteForm.patchValue({
      name : route.name,
      number  : route.number,
      time_interval : route.time_interval
    })
  }

  updateRoute(){
    if(this.editRouteForm.invalid){
      return this.message = "Vui lòng kiểm tra lại thông tin";
    }


    const {value} = this.editRouteForm;

    const id = this.router.snapshot.paramMap.get('id');

    this.routeService.updateRoute(id,value).subscribe(
      res => {
        this.message = "Sửa thông tin xe thành công";
        console.log(this.message);
        this.router2.navigateByUrl('/manager/routes');
      },
      err=>{
        this.message = "Sửa thông tin xe không thành công, vui lòng thử lại!";
        console.log(this.message);
      }
    )
  }

}
