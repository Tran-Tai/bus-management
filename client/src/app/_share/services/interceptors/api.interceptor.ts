import { HttpEvent, HttpHandler, HttpInterceptor, HttpRequest } from "@angular/common/http";
import { Observable } from "rxjs";

export class ApiInterceptor implements HttpInterceptor {

  intercept(req: HttpRequest<any>, next: HttpHandler): Observable<HttpEvent<any>>{
    const {url}  = req;

    req = req.clone({
      url: 'http://localhost:8000/api/'+ url
    })

    return next.handle(req)
  }
}
