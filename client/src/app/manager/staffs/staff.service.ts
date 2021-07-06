import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { Staff } from 'src/app/_share/models/staff.model';

@Injectable({
  providedIn: 'root'
})
export class StaffService {

  constructor(
    private http:HttpClient
  ) { }

  getStaff(id):Observable<Staff>{
    return this.http.get<Staff>('staffs/'+id);
  }

  getList():Observable<Array<Staff>>{
    return this.http.get<Array<Staff>>('staffs/');
  }

  addStaff(staff:Staff):Observable<Staff>{
    return this.http.post<Staff>('staffs/create', staff);
  }

  updateStaff(id,staff:Staff):Observable<Staff>{
    return this.http.put<Staff>('staffs/'+id, staff);
  }

  deleteStaff(id):Observable<any>{
    return this.http.delete<any>('staffs/'+id)
  }
}
