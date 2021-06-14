import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { Bus } from 'src/app/_share/models/bus.model';

@Injectable({
  providedIn: 'root'
})
export class BusesService {

  constructor(
    private http:HttpClient
  ) { }

  getBus(id):Observable<Bus>{
    return this.http.get<Bus>('http://localhost:3000/buses/'+id);
  }

  getList():Observable<Array<Bus>>{
    return this.http.get<Array<Bus>>('http://localhost:3000/buses/');
  }

  addBus(bus:Bus):Observable<Bus>{
    return this.http.post<Bus>('http://localhost:3000/buses/', bus);
  }

  updateBus(id,bus:Bus):Observable<Bus>{
    return this.http.put<Bus>('http://localhost:3000/buses/'+id, bus);
  }

  deleteBus(id):Observable<any>{
    return this.http.delete<any>('http://localhost:3000/buses/'+id)
  }
}
