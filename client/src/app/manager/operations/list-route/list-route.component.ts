import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { Title } from '@angular/platform-browser';
import { Route } from 'src/app/_share/models/route.model';
import { Staff } from 'src/app/_share/models/staff.model';
import { OperationsService } from '../operations.service';

@Component({
  selector: 'app-list-route',
  templateUrl: './list-route.component.html',
  styleUrls: ['./list-route.component.scss']
})
export class ListRouteComponent implements OnInit {

  routes : Array<Route> = [];
  operators : Array<Staff> = [];
  opertatorForm : FormGroup;

  constructor(
    private titleService: Title,
    private operationService: OperationsService,
    private formBuilder:FormBuilder
  ) {
    this.titleService.setTitle("Danh sách các chuyến trong một tuyến");
  }

  ngOnInit(): void {
    this.loadList();
    this.opertatorForm = this.formBuilder.group({
      operator_id : ['',Validators.required]
    });
  }

  loadList():void{
    this.operationService.getList().subscribe(res=> this.initData(res));
  }

  // loadList(event):void{
  //   this.operationService.getList(event).subscribe(res=>this.initData(res));
  // }

  initData(res){
    this.routes=res.routes;
    this.operators = res.operators;
  }

  saveOperator(){

  }

  private _filter(name: string): Array<Staff> {
    const filterValue = name.toLowerCase();
    return this.operators.filter(option => option.name.toLowerCase().includes(filterValue));
  }
}
