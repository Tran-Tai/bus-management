import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { Route } from 'src/app/_share/models/route.model';
import { RouteData } from 'src/app/_share/models/routeData.model';
import { Station } from 'src/app/_share/models/station.model';

@Injectable({
  providedIn: 'root'
})
export class RouteService {

  constructor(
    private http:HttpClient
  ) { }

  getRoute(id):Observable<RouteData>{
    return this.http.get<RouteData>('routes/'+id);
  }

  getList():Observable<Array<Route>>{
    return this.http.get<Array<Route>>('routes/');
  }

  addRoute(route:Route):Observable<Route>{
    return this.http.post<Route>('routes/createname', route);
  }

  updateRoute(id,route:Route):Observable<Route>{
    return this.http.put<Route>('routes/'+id, route);
  }

  deleteRoute(id):Observable<any>{
    return this.http.delete<any>('routes/'+id)
  }

  createRoute(id,direction){
    console.log(id,direction);
    return this.http.get('routes/createroute/'+id+'/'+direction);
  }

  getListStation():Observable<Array<Station>>{
    return this.http.get<Array<Station>>('stations/');
  }

  addStationToRoute(id,number,value){
    console.log(value);

    return this.http.post('routes/create/'+id+'/'+number, value);
  }

  search(keyword):Observable<Array<Route>>{
    return this.http.get<Array<Route>>('routes/search/'+keyword);
  }
}
