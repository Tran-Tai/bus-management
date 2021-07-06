import { Component, OnInit } from '@angular/core';
import { Title } from '@angular/platform-browser';
import { Station } from 'src/app/_share/models/station.model';
import { StationService } from '../station.service';

@Component({
  selector: 'app-list-station',
  templateUrl: './list-station.component.html',
  styleUrls: ['./list-station.component.scss']
})
export class ListStationComponent implements OnInit {

  stations : Array<Station> = [];
  constructor(
    private titleService:Title,
    private stationService:StationService
  ) {
    this.titleService.setTitle('Danh sách trạm')
   }

  ngOnInit(): void {
    this.loadStation();
  }

  loadStation():void{
    this.stationService.getList().subscribe(res=>this.stations = res);
  }

  search(keyword){
    this.stationService.search(keyword).subscribe(res=> this.getSearchStation(res));
  }

  getSearchStation(res){
    console.log(res);
    this.stations = res;
  }
}
