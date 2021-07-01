import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { Bus } from 'src/app/_share/models/bus.model';
import { DataBus } from 'src/app/_share/models/dataBus.model';
import { Route } from 'src/app/_share/models/route.model';

@Injectable({
  providedIn: 'root'
})
export class BusesService {

  constructor(
    private http:HttpClient
  ) { }

  getBus(id):Observable<DataBus>{
    return this.http.get<DataBus>('buses/'+id);
  }

  getList():Observable<Array<Bus>>{
    return this.http.get<Array<Bus>>('buses/');
  }

  addBus(bus:Bus):Observable<Bus>{
    return this.http.post<Bus>('buses/', bus);
  }

  updateBus(id,bus:Bus):Observable<Bus>{
    return this.http.put<Bus>('buses/'+id, bus);
  }

  deleteBus(id):Observable<any>{
    return this.http.delete<any>('buses/'+id)
  }

  getRoute():Observable<Array<Route>>{
    return this.http.get<Array<Route>>('routes/');
  }
}
