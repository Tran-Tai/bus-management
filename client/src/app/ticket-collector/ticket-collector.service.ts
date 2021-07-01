import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { Trip } from '../_share/models/trip.model';

@Injectable({
  providedIn: 'root'
})
export class TicketCollectorService {

  constructor(
    private http:HttpClient
  ) { }

    getList(date):Observable<Array<Trip>>{
      return this.http.get<Array<Trip>>('http://localhost:3000/trips?date='+date)
    }

    addActualTime(id, actual_time):void{
      this.http.put('http://localhost:3000/test/'+id, actual_time)
    }
}
