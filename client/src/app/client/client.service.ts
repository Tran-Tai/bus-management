import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { Result } from '../_share/models/result.model';
import { Route } from '../_share/models/route.model';
import { Station } from '../_share/models/station.model';

@Injectable({
  providedIn: 'root'
})
export class ClientService {

  result : Result;

  constructor(
    private http:HttpClient
  ) { }

  getListStation():Observable<Array<Station>>{
    return this.http.get<Array<Station>>('http://localhost:3000/stations/');
  }

  getListRoute():Observable<Array<Route>>{
    return this.http.get<Array<Route>>('http://localhost:3000/routes/');
  }

  // search():Observable<Result>{
  //   return this.http.post<Result>('http://localhost:3000/result/');
  //   console.log(this.http.get<Result>('http://localhost:3000/result/'));

  // }

  // getResult(){
  //   this.result = this.search()
  // }
}
