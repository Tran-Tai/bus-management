import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { Trip } from 'src/app/_share/models/trip.model';
import { OperatorService } from '../operator.service';

@Component({
  selector: 'app-trip-list',
  templateUrl: './trip-list.component.html',
  styleUrls: ['./trip-list.component.scss']
})
export class TripListComponent implements OnInit {

  trips: Array<Trip> = [];
  route:Trip;

  constructor(
    private operatorService:OperatorService,
    private router:ActivatedRoute
  ) { }

  ngOnInit(): void {
    const id = this.router.snapshot.paramMap.get('id');
    const date = this.router.snapshot.paramMap.get('date');
    this.getTrips(id,date);

  }

  getTrips(id,date){
    return this.operatorService.getTrips(id,date).subscribe(res=>this.getTripInfo(res))
  }

  getTripInfo(res){
    this.trips=res;
    this.route = this.trips[0]
  }

  formatDate(number){
    var date = new Date();
    date.setTime(number);
    const text = date.toLocaleTimeString();
    return text;
  }
}
