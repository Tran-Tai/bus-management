import { Component, OnInit } from '@angular/core';
import { ClientService } from '../client.service';

@Component({
  selector: 'app-result',
  templateUrl: './result.component.html',
  styleUrls: ['./result.component.scss']
})
export class ResultComponent implements OnInit {

  result = [];
  station = [];
  paths: [];

  constructor(
    private clientService:ClientService
  ) { }

  ngOnInit(): void {
    // this.clientService.search();
    // this.loadPath();
  }

  // loadPath(){
  //   this.clientService.getResult().subscribe(res=> this.initPaths(res))
  // }

  initPaths(res){
    this.result = res
    this.station = this.result["station"];
    this.paths = this.result["paths"];
    console.log(this.station)
  }

}
