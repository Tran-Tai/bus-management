import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { StationInfo } from '../_share/models/stationInfo.model';
import { Trip } from '../_share/models/trip.model';

@Injectable({
  providedIn: 'root'
})
export class DriverService {

  constructor(
    private http:HttpClient
  ) { }

    getList(date):Observable<Array<Trip>>{
      return this.http.get<Array<Trip>>('http://localhost:3000/trips?date='+date)
    }

    getListStation():Observable<Array<StationInfo>>{
      return this.http.get<Array<StationInfo>>('http://localhost:3000/test/')
    }

    addActualTime(id,actual_time):void{
      this.http.put('http://localhost:3000/test/'+id,actual_time)
    }
}
