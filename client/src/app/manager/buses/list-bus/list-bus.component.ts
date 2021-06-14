import { Component, OnInit } from '@angular/core';
import { Title } from '@angular/platform-browser';
import { Bus } from 'src/app/_share/models/bus.model';
import { BusesService } from '../buses.service';

@Component({
  selector: 'app-list-bus',
  templateUrl: './list-bus.component.html',
  styleUrls: ['./list-bus.component.scss']
})
export class ListBusComponent implements OnInit {

  buses : Array<Bus> = [];

  constructor(
    private titleService: Title ,
    private busService: BusesService
  ) {
    this.titleService.setTitle("Danh sách xe buýt")
  }

  ngOnInit(): void {
    this.loadBuses();
  }

  loadBuses():void{
    this.busService.getList().subscribe(res=>this.buses = res);
  }
}
