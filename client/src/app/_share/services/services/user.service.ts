import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { map,catchError } from 'rxjs/operators';


// const httpOptions = {
//   headers:new HttpHeaders({'Content-Type':'application/json'})
// };

// const API_URL = "http://localhost:8000/server/public/api";

@Injectable({
  providedIn: 'root'
})
export class UserService {

  constructor(private http:HttpClient) { }

  login(user:any){
    return this.http.post<any>('login', user)
  }
}
