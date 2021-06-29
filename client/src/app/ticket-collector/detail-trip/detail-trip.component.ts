import { Component, OnInit } from '@angular/core';
import { Title } from '@angular/platform-browser';
import { Trip } from 'src/app/_share/models/trip.model';
import { TicketCollectorService } from '../ticket-collector.service';

@Component({
  selector: 'app-detail-trip',
  templateUrl: './detail-trip.component.html',
  styleUrls: ['./detail-trip.component.scss']
})
export class DetailTripComponent implements OnInit {

  trips:Array<Trip> = [];

  constructor(
    private titleService:Title,
    private ticketCollectorService:TicketCollectorService
  ) {
    this.titleService.setTitle("Thông tin chi tiết của một chuyến");
   }

  ngOnInit(): void {
    // this.loadList()
  }

  loadList(event):void{
    this.ticketCollectorService.getList(event).subscribe(res=>this.getTripInfo(res));
    // console.log(this.trips);
  }

  getTripInfo(res) {
    this.trips=res;
    // console.log(this.trips);
  }
}
