import { Component, OnInit } from '@angular/core';
import { Title } from '@angular/platform-browser';
import { Operation } from 'src/app/_share/models/operation.model';
import { OperationsService } from '../operations.service';

@Component({
  selector: 'app-list-trip',
  templateUrl: './list-trip.component.html',
  styleUrls: ['./list-trip.component.scss']
})
export class ListTripComponent implements OnInit {

  operations:Array<Operation> = [];


  constructor(
    private titleService: Title,
    private operationService: OperationsService
  ) {
    this.titleService.setTitle("Phân công điều hành tuyến theo từng ngày");
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
