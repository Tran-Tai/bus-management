import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';

@Component({
  selector: 'app-edit-staff',
  templateUrl: './edit-staff.component.html',
  styleUrls: ['./edit-staff.component.scss']
})
export class EditStaffComponent implements OnInit {

  editStaffForm:FormGroup ;

  constructor(
    private formBuilder : FormBuilder
  ) { }

  ngOnInit(): void {
    this.editStaffForm = this.formBuilder.group({
      staff_name:['',Validators.required]
    })
  }

  updateStaff(){}
}
