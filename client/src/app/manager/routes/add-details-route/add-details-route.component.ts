import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-add-details-route',
  templateUrl: './add-details-route.component.html',
  styleUrls: ['./add-details-route.component.scss']
})
export class AddDetailsRouteComponent implements OnInit {

  constructor() { }

  ngOnInit(): void {
  }

  createTable(number){

  }
  book = {name: '123', year: 1993, stars: null};


}
