import { Component, OnInit } from '@angular/core';
import { Title } from '@angular/platform-browser';
import { ActivatedRoute, Router } from '@angular/router';
import { title } from 'process';
import { Route } from 'src/app/_share/models/route.model';
import { RouteService } from '../route.service';

@Component({
  selector: 'app-delete-route',
  templateUrl: './delete-route.component.html',
  styleUrls: ['./delete-route.component.scss']
})
export class DeleteRouteComponent implements OnInit {

  route:Route;
  message:string;

  constructor(
    private routeService:RouteService,
    private title:Title,
    private router:ActivatedRoute,
    private router2:Router
  ) {
    this.title.setTitle('Xóa trạm')
   }

  ngOnInit(): void {
    const id = this.router.snapshot.paramMap.get('id');
    this.routeService.getRoute(id).subscribe(res=> this.route = res.route);
  }

  deleteStation(id){
    this.routeService.deleteRoute(id).subscribe(
      res=> {
        this.message = "Xóa trạm thành công";
        console.log(this.message);
        this.router2.navigateByUrl('/manager/stations');
      },
      err=> {
        this.message = "Xóa trạm không thành công, vui lòng thử lại";
        console.log(this.message);
      }
    )
  }

}
