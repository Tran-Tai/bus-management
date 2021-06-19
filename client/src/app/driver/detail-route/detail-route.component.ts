import { decimalDigest } from '@angular/compiler/src/i18n/digest';
import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup } from '@angular/forms';
import { StationInfo } from 'src/app/_share/models/stationInfo.model';
import { Trip } from 'src/app/_share/models/trip.model';
import { DriverService } from '../driver.service';

@Component({
  selector: 'app-detail-route',
  templateUrl: './detail-route.component.html',
  styleUrls: ['./detail-route.component.scss']
})
export class DetailRouteComponent implements OnInit {

  stations:Array<StationInfo> = [];
  trip:Trip;
  time_difference:number = 0;
  station_current:StationInfo = null;
  next_station:StationInfo = null;
  confirmForm:FormGroup;

  constructor(
    private driverService:DriverService,
    private formBuilder:FormBuilder
  ) { }

  ngOnInit(): void {
    this.getListStation();
    this.confirmForm = this.formBuilder.group({
      actual_time:[]
    });

  }

  getListStation(){
    this.driverService.getListStation().subscribe(res=>this.getStation(res))
  }

  setStationCurrent(val){
    this.station_current = val;
  }

  setStationNext(val){
    this.next_station = val
  }

  getStation(res){
    this.stations= res;
    for(let i = 0; i< this.stations.length ; i++){
      if(this.stations[i].actual_time == null){
        this.setStationCurrent(this.stations[i]);
        // this.station_current = this.stations[i];
        this.setStationNext(this.stations[i+1]);
        break;
      }
    }
    console.log( this.station_current);
  }

  addActualTime(id){
    const actual_time = 1
    console.log(this.driverService.addActualTime(id,actual_time));
    return this.driverService.addActualTime(id,actual_time)
  }

  calculate(station:StationInfo){
    if(station.actual_time == null){
      return station.arrive_time + this.trip.start_time + this.time_difference;
    }else{
      this.time_difference = station.actual_time - station.arrive_time;
      return station.actual_time;
    }
  }

  formatDate(number){
    var date = new Date();
    date.setTime(number);
    const text = date.toLocaleTimeString();
    return text;
  }
}
