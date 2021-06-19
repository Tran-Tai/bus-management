import { Component, OnInit } from '@angular/core';
import { Title } from '@angular/platform-browser';
import { Operation } from 'src/app/_share/models/operation.model';
import { OperationsService } from '../operations.service';

@Component({
  selector: 'app-list-route',
  templateUrl: './list-route.component.html',
  styleUrls: ['./list-route.component.scss']
})
export class ListRouteComponent implements OnInit {

  operations:Array<Operation> = [];

  constructor(
    private titleService: Title,
    private operationService: OperationsService
  ) { 
    this.titleService.setTitle("Danh sách các chuyến trong một tuyến");
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
