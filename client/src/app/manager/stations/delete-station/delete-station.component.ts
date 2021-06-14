import { Component, OnInit } from '@angular/core';
import { Title } from '@angular/platform-browser';
import { ActivatedRoute, Router } from '@angular/router';
import { Station } from 'src/app/_share/models/station.model';
import { StationService } from '../station.service';

@Component({
  selector: 'app-delete-station',
  templateUrl: './delete-station.component.html',
  styleUrls: ['./delete-station.component.scss']
})
export class DeleteStationComponent implements OnInit {

  station:Station;
  message:string;

  constructor(
    private titleService:Title,
    private stationService:StationService,
    private router:ActivatedRoute,
    private router2:Router
  ) {
    this.titleService.setTitle('Xóa trạm')
  }

  ngOnInit(): void {
    const id = this.router.snapshot.paramMap.get('id');
    this.stationService.getStation(id).subscribe(res=> this.station = res);
  }

  deleteStation(id){
    this.stationService.deleteStation(id).subscribe(
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
