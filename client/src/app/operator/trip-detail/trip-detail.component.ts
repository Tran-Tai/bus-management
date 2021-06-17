import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { Station } from 'src/app/_share/models/station.model';
import { StationInfo } from 'src/app/_share/models/stationInfo.model';
import { Trip } from 'src/app/_share/models/trip.model';
import { OperatorService } from '../operator.service';

@Component({
  selector: 'app-trip-detail',
  templateUrl: './trip-detail.component.html',
  styleUrls: ['./trip-detail.component.scss']
})
export class TripDetailComponent implements OnInit {

  trip:Trip;
  stations:Array<Station>;
  time_difference:number;

  constructor(
    private operatorService:OperatorService,
    private router:ActivatedRoute
  ) { }

  ngOnInit(): void {
    const id = this.router.snapshot.paramMap.get('id');
    this.getTrip(id);
  }

  getTrip(id){
    return this.operatorService.getTrip(id).subscribe(res=>this.getTripInfo(res))
  }

  getTripInfo(res){
    return this.trip = res
  }

  calculate(station:StationInfo){
    if(station.actual_time == null){
      return station.arrive_time + this.trip.start_time + this.time_difference;
    }else{
      this.time_difference = station.actual_time - station.arrive_time;
      return station.actual_time;
    }
  }
}
