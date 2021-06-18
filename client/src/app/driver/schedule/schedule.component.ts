import { Component, OnInit } from '@angular/core';
import { Trip } from 'src/app/_share/models/trip.model';
import { DriverService } from '../driver.service';

@Component({
  selector: 'app-schedule',
  templateUrl: './schedule.component.html',
  styleUrls: ['./schedule.component.scss']
})
export class ScheduleComponent implements OnInit {

  trips:Array<Trip> = [];


  constructor(
    private driverService:DriverService
  ) { }

  ngOnInit(): void {
    // this.loadList()
  }

  loadList(event):void{
    this.driverService.getList(event).subscribe(res=>this.getTripInfo(res));
    // console.log(this.trips);
  }

  // getStaff(event){
  //   return this.driverService.getStaff(event).subscribe(res=>this.getStaffInfo(res));
  // }

  getTripInfo(res) {
    this.trips=res;
    // console.log(this.trips);
  }

  formatDate(number){
    var date = new Date();
    date.setTime(number);
    const text = date.toLocaleTimeString();
    return text;
  }

}
