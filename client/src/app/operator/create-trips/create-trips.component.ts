import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { Staff } from 'src/app/_share/models/staff.model';
import { OperatorService } from '../operator.service';

@Component({
  selector: 'app-create-trips',
  templateUrl: './create-trips.component.html',
  styleUrls: ['./create-trips.component.scss']
})
export class CreateTripsComponent implements OnInit {

  createTripForm:FormGroup;
  availableStaff:Array<Staff> = [];


  constructor(
    private formBuilder:FormBuilder,
    private operatorService:OperatorService
  ) { }

  ngOnInit(): void {

    this.createTripForm = this.formBuilder.group({
      name:['',Validators.required],
      date:['',Validators.required]
    })
  }

  getStaffInfo(res) {
    this.availableStaff=res;
    console.log(this.availableStaff);
  }

  addTrip(){}

  getStaff(event){
    return this.operatorService.getStaff(event).subscribe(res=>this.getStaffInfo(res));
  }

}
