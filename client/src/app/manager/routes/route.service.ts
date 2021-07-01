import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { Route } from 'src/app/_share/models/route.model';

@Injectable({
  providedIn: 'root'
})
export class RouteService {

  constructor(
    private http:HttpClient
  ) { }

  getRoute(id):Observable<Route>{
    return this.http.get<Route>('routes/'+id);
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
}
