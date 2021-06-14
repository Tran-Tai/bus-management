import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { Title } from '@angular/platform-browser';
import { ActivatedRoute } from '@angular/router';
import { Staff } from 'src/app/_share/models/staff.model';
import { StaffService } from '../staff.service';

@Component({
  selector: 'app-details-staff',
  templateUrl: './details-staff.component.html',
  styleUrls: ['./details-staff.component.scss']
})
export class DetailsStaffComponent implements OnInit {

  staff:Staff;
  detailsStaffForm:FormGroup;

  constructor(
    private titleService : Title,
    private router:ActivatedRoute,
    private staffService:StaffService,
    private formBuilder:FormBuilder
  ) {
    this.titleService.setTitle('Chi tiết trạm')
  }

  ngOnInit(): void {
    const id = this.router.snapshot.paramMap.get('id');
    this.staffService.getStaff(id).subscribe(res=>this.staff = res);
    this.initForm();
    this.staffService.getStaff(id).subscribe(res=>this.pathStaffFormValue(res));

  }

  initForm(){
    this.detailsStaffForm = this.formBuilder.group({
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
    this.detailsStaffForm.patchValue({
      name : staff.name,
      gender : staff.gender,
      birthday : staff.birthday,
      identity_number : staff.identity_number,
      role_code : staff.role_code,
      user_name : staff.user_name,
      password : staff.password
    })
  }

}
