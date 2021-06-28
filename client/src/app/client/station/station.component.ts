import { Component, OnInit } from '@angular/core';
import { Station } from 'src/app/_share/models/station.model';
import { ClientService } from '../client.service';

@Component({
  selector: 'app-station',
  templateUrl: './station.component.html',
  styleUrls: ['./station.component.scss']
})
export class StationComponent implements OnInit {

  stations : Array<Station> = [];

  constructor(
    private clientService:ClientService
  ) { }

  ngOnInit(): void {
    this.loadStation()
  }

  loadStation():void{
    this.clientService.getListStation().subscribe(res=>this.stations = res);
  }
}
