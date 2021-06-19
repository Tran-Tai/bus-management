import { Component, OnInit } from '@angular/core';
import { Title } from '@angular/platform-browser';
import { Operation } from 'src/app/_share/models/operation.model';
import { OperationsService } from '../operations.service';

@Component({
  selector: 'app-list-route-day',
  templateUrl: './list-route-day.component.html',
  styleUrls: ['./list-route-day.component.scss']
})
export class ListRouteDayComponent implements OnInit {

  operations:Array<Operation> =[];

  constructor(
    private titleService: Title,
    private operationService: OperationsService
  ) { 
    this.titleService.setTitle("Danh sách các tuyến đã phân công trong một ngày")
  }

  ngOnInit(): void {
    // this.loadList();
  }

  
  loadList(event):void{
    this.operationService.getList(event).subscribe(res=>this.getOperationInfo(res));
    console.log(this.operations);
  }

  getOperationInfo(res){
    this.operations=res;
    console.log(this.operations);
  }

}
