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
    return this.http.get<Route>('http://localhost:3000/routes/'+id);
  }

  getList():Observable<Array<Route>>{
    return this.http.get<Array<Route>>('http://localhost:3000/routes/');
  }

  addRoute(route:Route):Observable<Route>{
    return this.http.post<Route>('http://localhost:3000/routes/', route);
  }

  updateRoute(id,route:Route):Observable<Route>{
    return this.http.put<Route>('http://localhost:3000/routes/'+id, route);
  }

  deleteRoute(id):Observable<any>{
    return this.http.delete<any>('http://localhost:3000/routes/'+id)
  }
}
