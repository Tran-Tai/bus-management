import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { Title } from '@angular/platform-browser';
import { StaffService } from '../staff.service';

@Component({
  selector: 'app-create-staff',
  templateUrl: './create-staff.component.html',
  styleUrls: ['./create-staff.component.scss']
})
export class CreateStaffComponent implements OnInit {

  createStaffForm:FormGroup;
  message:string;

  constructor(
    private staffService:StaffService,
    private formBuilder:FormBuilder,
    private title:Title
  ) {
    this.title.setTitle('Thêm mới nhân viên')
  }

  ngOnInit(): void {
    this.createStaffForm = this.formBuilder.group(
      {
        name:['',Validators.required],
        gender:['1',Validators.required],
        birthday:[,Validators.required],
        identity_number:['1',Validators.required],
        role_code:['1',Validators.required],
        user_name:['',Validators.required],
        password:['',Validators.required]
      }
    )
  }

  addStaff(){
    if(this.createStaffForm.invalid){
       this.message = "Vui lòng điền đầy đủ thông tin";
       return console.log(this.message);
    }

    const {value} = this.createStaffForm;

    this.staffService.addStaff(value).subscribe(
      res => {
        this.message = "Thêm nhân viên mới thành công";
        console.log(this.message);
      },
      err =>{
        this.message = "Thêm nhân viên mới không thành công, vui lòng thử lại";
        console.log(this.message);
      }
    )
  }

}
