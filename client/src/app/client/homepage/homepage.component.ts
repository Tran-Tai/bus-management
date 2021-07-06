import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormControl, FormGroup, Validators } from '@angular/forms';
import { Observable } from 'rxjs';
import { ClientService } from '../client.service';
import {map, startWith} from 'rxjs/operators';
import { Station } from 'src/app/_share/models/station.model';
import { Router } from '@angular/router';
import { Title } from '@angular/platform-browser';


@Component({
  selector: 'app-homepage',
  templateUrl: './homepage.component.html',
  styleUrls: ['./homepage.component.scss']
})
export class HomepageComponent implements OnInit {

  fromStationControl = new FormControl();
  fromStationId: number;
  toStationControl = new FormControl();
  toStationId:number;
  fromoptions : Array<Station> = [];
  tooptions : Array<Station> = [];
  filteredOptions : Observable<Station[]>;
  filteredOptions2 : Observable<Station[]>;
  message :string;

  constructor(
    private clientService:ClientService,
    private router:Router,
    private title:Title
  ) {
    this.title.setTitle('Trang chủ')
   }

  ngOnInit(): void {

    this.loadStation();
  }

  loadStation(){
    this.clientService.getListStation().subscribe(res=>this.getStations(res));

  }

  getStations(res){
    this.fromoptions = res;
    this.tooptions = res;
    this.filteredOptions = this.fromStationControl.valueChanges
      .pipe(
        startWith(''),
        map(value => typeof value === 'string' ? value : value.name),
        map(name => name ? this._filter(name) : this.fromoptions.slice())
      );
      this.filteredOptions2 = this.toStationControl.valueChanges
      .pipe(
        startWith(''),
        map(value => typeof value === 'string' ? value : value.name),
        map(name => name ? this._filter2(name) : this.tooptions.slice())
      );
  }

  private _filter(name: string): Array<Station> {
    const filterValue = name.toLowerCase();
    return this.fromoptions.filter(option => option.name.toLowerCase().includes(filterValue));
  }

  private _filter2(name: string): Array<Station> {
    const filterValue2 = name.toLowerCase();
    return this.tooptions.filter(option => option.name.toLowerCase().includes(filterValue2));
  }

  search(fromStationId,toStationId){
    if(fromStationId == toStationId){
      return alert('Vui lòng chọn 2 trạm khác nhau');
    }else{
      return this.router.navigateByUrl('/result/'+fromStationId+'/'+toStationId);
    }
  }

  getFromId(id){
    this.fromStationId = id;
  }

  getToId(id){
    this.toStationId = id;
  }

  displayFn(station: Station): string {
    return station && station.name ? station.name : '';
  }

}
