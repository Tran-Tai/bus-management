import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { Title } from '@angular/platform-browser';
import { ActivatedRoute } from '@angular/router';
import { identity } from 'rxjs';
import { Staff } from 'src/app/_share/models/staff.model';
import { StaffService } from '../staff.service';

@Component({
  selector: 'app-edit-staff',
  templateUrl: './edit-staff.component.html',
  styleUrls: ['./edit-staff.component.scss']
})
export class EditStaffComponent implements OnInit {

  staff:Staff;
  editStaffForm:FormGroup;
  message:string;

  constructor(
    private titleService:Title,
    private staffService:StaffService,
    private router:ActivatedRoute,
    private formBuilder:FormBuilder
  ) {
    this.titleService.setTitle('Chỉnh sửa thông tin nhân viên');
  }

  ngOnInit(): void {
    const id = this.router.snapshot.paramMap.get('id');
    this.staffService.getStaff(id).subscribe(res=>this.staff = res);
    this.initForm();
    this.staffService.getStaff(id).subscribe(res=>this.pathStaffFormValue(res));
  }

  initForm(){
    this.editStaffForm = this.formBuilder.group({
      name : ['',Validators.required],
      gender : ['',Validators.required],
      birthday : ['',Validators.required],
      identity_number : ['',Validators.required],
      role_code : ['', Validators.required],
      user_name : ['', Validators.required],
      password : ['', Validators.required]
    })
  }

  pathStaffFormValue(staff:Staff){
    this.editStaffForm.patchValue({
      name : staff.name,
      gender : staff.gender,
      birthday : staff.birthday,
      identity_number : staff.identity_number,
      role_code : staff.role_code,
      user_name : staff.user_name,
      password : staff.password
    })
  }

  updateStaff(){
    if(this.editStaffForm.invalid){
      return this.message = "Vui lòng kiểm tra lại thông tin";
    }


    const {value} = this.editStaffForm;

    const id = this.router.snapshot.paramMap.get('id');

    this.staffService.updateStaff(id,value).subscribe(
      res => {
        this.message = "Sửa thông tin trạm thành công";
        console.log(this.message);
      },
      err=>{
        this.message = "Sửa thông tin trạm không thành công, vui lòng thử lại!";
        console.log(this.message);
      }
    )
  }


}
