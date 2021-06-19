import { Component, OnInit } from '@angular/core';
import { Operation } from 'src/app/_share/models/operation.model';
import { OperatorService } from '../operator.service';

@Component({
  selector: 'app-schedule',
  templateUrl: './schedule.component.html',
  styleUrls: ['./schedule.component.scss']
})
export class ScheduleComponent implements OnInit {

  operations:Array<Operation> = [];

  constructor(
    private operationService:OperatorService
  ) { }

  ngOnInit(): void {
    this.loadList()
  }

  loadList():void{
    this.operationService.getList().subscribe(res=>this.operations = res);
  }
}
