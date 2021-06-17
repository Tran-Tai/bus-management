import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { Operation } from '../_share/models/operation.model';
import { Staff } from '../_share/models/staff.model';
import { Trip } from '../_share/models/trip.model';

@Injectable({
  providedIn: 'root'
})
export class OperatorService {

  constructor(
    private http:HttpClient
  ) { }

  getList():Observable<Array<Operation>>{
    return this.http.get<Array<Operation>>('http://localhost:3000/operations');
  }

  getStaff(event:number):Observable<Array<Staff>>{
    return this.http.get<Array<Staff>>('http://localhost:3000/staffs?gender='+event);
  }

  getTrips(id,date):Observable<Array<Trip>>{
    return this.http.get<Array<Trip>>('http://localhost:3000/trips?route_id='+id+'&date='+date);
  }

  getTrip(id):Observable<Trip>{
    return this.http.get<Trip>('http://localhost:3000/trips/'+id);
  }


}
