import { Component, OnInit } from '@angular/core';
import { Title } from '@angular/platform-browser';
import { Operation } from 'src/app/_share/models/operation.model';
import { OperationsService } from '../operations.service';

@Component({
  selector: 'app-detail-trip',
  templateUrl: './detail-trip.component.html',
  styleUrls: ['./detail-trip.component.scss']
})
export class DetailTripComponent implements OnInit {

  operations:Array<Operation> = [];

  constructor(
    private titleService: Title,
    private operationService: OperationsService
  ) {
    this.titleService.setTitle("Thông tin chi tiết của một chuyến");
  }

  ngOnInit(): void {
     // this.loadList();
  }

  // loadList(event):void{
  //   this.operationService.getList(event).subscribe(res=>this.getOperationInfo(res));
  //   console.log(this.operations);
  // }

  getOperationInfo(res){
    this.operations=res;
    console.log(this.operations);
  }
}
