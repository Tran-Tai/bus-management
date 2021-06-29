import { Component, OnInit } from '@angular/core';
import { Title } from '@angular/platform-browser';
import { Trip } from 'src/app/_share/models/trip.model';
import { TicketCollectorService } from '../ticket-collector.service';

@Component({
  selector: 'app-schedule',
  templateUrl: './schedule.component.html',
  styleUrls: ['./schedule.component.scss']
})
export class ScheduleComponent implements OnInit {

  trips:Array<Trip> = [];

  constructor(
    private titleService: Title,
    private ticketCollectorService:TicketCollectorService
  ) {
    this.titleService.setTitle("Lịch làm việc của nhân viên soát vé");
   }

  ngOnInit(): void {
    // this.loadList()
  }

  loadList(event):void{
    this.ticketCollectorService.getList(event).subscribe(res=>this.getTripInfo(res));
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
