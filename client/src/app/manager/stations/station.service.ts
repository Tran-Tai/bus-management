import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { from, Observable } from 'rxjs';
import { Station } from '../../_share/models/station.model'

@Injectable({
  providedIn: 'root'
})
export class StationService {

  constructor(
    private http: HttpClient,
    private router:ActivatedRoute
  ) { }

  getStation(id):Observable<Station>{
    return this.http.get<Station>('stations/'+id);
  }

  getList():Observable<Array<Station>>{
    return this.http.get<Array<Station>>('stations/');
  }

  addStation(station:Station):Observable<Station>{
    return this.http.post<Station>('stations/create', station);
  }

  updateStation(id,station:Station):Observable<Station>{
    return this.http.put<Station>('stations/'+id, station);
  }

  deleteStation(id):Observable<any>{
    return this.http.delete<any>('stations/'+id)
  }

  search(keyword):Observable<Array<Station>>{
    return this.http.get<Array<Station>>('stations/search/'+keyword);
  }

}
