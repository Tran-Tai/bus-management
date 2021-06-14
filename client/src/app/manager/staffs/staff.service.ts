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
    return this.http.get<Staff>('http://localhost:3000/staffs/'+id);
  }

  getList():Observable<Array<Staff>>{
    return this.http.get<Array<Staff>>('http://localhost:3000/staffs/');
  }

  addStaff(staff:Staff):Observable<Staff>{
    return this.http.post<Staff>('http://localhost:3000/staffs/', staff);
  }

  updateStaff(id,staff:Staff):Observable<Staff>{
    return this.http.put<Staff>('http://localhost:3000/staffs/'+id, staff);
  }

  deleteStaff(id):Observable<any>{
    return this.http.delete<any>('http://localhost:3000/staffs/'+id)
  }
}
