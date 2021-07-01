import { Component, OnInit } from '@angular/core';
import { Title } from '@angular/platform-browser';

@Component({
  selector: 'app-detail-station',
  templateUrl: './detail-station.component.html',
  styleUrls: ['./detail-station.component.scss']
})
export class DetailStationComponent implements OnInit {

  constructor(
    private titleService: Title
  ) {
    this.titleService.setTitle("Xác nhận số lượng hành khách");
   }

  ngOnInit(): void {
  }

  clickMethod(name:string){
    if(confirm("Xác nhận thêm khách")){
      console.log("Xác nhận thêm khách");
    }
  }

}
