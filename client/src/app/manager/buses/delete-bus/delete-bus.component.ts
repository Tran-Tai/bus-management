import { Component, OnInit } from '@angular/core';
import { Title } from '@angular/platform-browser';
import { ActivatedRoute, Router } from '@angular/router';
import { Bus } from 'src/app/_share/models/bus.model';
import { BusesService } from '../buses.service';

@Component({
  selector: 'app-delete-bus',
  templateUrl: './delete-bus.component.html',
  styleUrls: ['./delete-bus.component.scss']
})
export class DeleteBusComponent implements OnInit {

  bus:Bus;
  message:string;

  constructor(
    private title:Title,
    private busService:BusesService,
    private router:ActivatedRoute,
    private router2:Router
  ) {
    this.title.setTitle('Xóa xe')
  }

  ngOnInit(): void {
    const id = this.router.snapshot.paramMap.get('id');
    this.busService.getBus(id).subscribe(res=> this.bus = res);
  }

  deleteBus(id){
    this.busService.deleteBus(id).subscribe(
      res=> {
        this.message = "Xóa xe thành công";
        console.log(this.message);
        this.router2.navigateByUrl('/manager/buses');
      },
      err=> {
        this.message = "Xóa xe không thành công, vui lòng thử lại";
        console.log(this.message);
      }
    )
  }

}
