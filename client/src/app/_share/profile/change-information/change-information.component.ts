import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { Title } from '@angular/platform-browser';

@Component({
  selector: 'app-change-information',
  templateUrl: './change-information.component.html',
  styleUrls: ['./change-information.component.scss']
})
export class ChangeInformationComponent implements OnInit {

  editStaffForm:FormGroup

  constructor(
    private title:Title,
    private formBuilder:FormBuilder
  ) {
    this.title.setTitle('Cập nhật thông tin nhân viên')
   }

  ngOnInit(): void {
    this.editStaffForm = this.formBuilder.group({
      name:['',Validators.required]
    })
  }

  updateStaff(){}

}
