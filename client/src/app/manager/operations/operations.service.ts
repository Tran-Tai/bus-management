import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { Operation } from 'src/app/_share/models/operation.model';

@Injectable({
  providedIn: 'root'
})
export class OperationsService {

  constructor(
    private http:HttpClient
  ) { }

  getList():Observable<Array<Operation>>{
    return this.http.get<Array<Operation>>('operations/create')
  }
}
