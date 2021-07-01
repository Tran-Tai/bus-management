import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';

@Component({
  selector: 'app-change-information',
  templateUrl: './change-information.component.html',
  styleUrls: ['./change-information.component.scss']
})
export class ChangeInformationComponent implements OnInit {

  editStaffForm:FormGroup

  constructor(
    private formBuilder:FormBuilder
  ) { }

  ngOnInit(): void {
    this.editStaffForm = this.formBuilder.group({
      name:['',Validators.required]
    })
  }

  updateStaff(){}

}
