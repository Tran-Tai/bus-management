import { Component, OnInit } from '@angular/core';
import { FormControl } from '@angular/forms';
import { Title } from '@angular/platform-browser';
import { ActivatedRoute, Router } from '@angular/router';
import { Observable } from 'rxjs';
import { map, startWith } from 'rxjs/operators';
import { Path } from 'src/app/_share/models/path.model';
import { Station } from 'src/app/_share/models/station.model';
import { ClientService } from '../client.service';

@Component({
  selector: 'app-result',
  templateUrl: './result.component.html',
  styleUrls: ['./result.component.scss']
})
export class ResultComponent implements OnInit {

  fromStationControl = new FormControl();
  fromStationId: number;
  toStationControl = new FormControl();
  toStationId:number;
  fromoptions : Array<Station> = [];
  tooptions : Array<Station> = [];
  filteredOptions : Observable<Station[]>;
  filteredOptions2 : Observable<Station[]>;

  paths : Array<Path> = [];

  constructor(
    private clientService:ClientService,
    private router:ActivatedRoute,
    private router2:Router,
    private title:Title
  ) {
    this.title.setTitle('Kết quả tìm kiếm');
  }

  ngOnInit(): void {
    const fromStationId = this.router.snapshot.paramMap.get('fromStationId');
    const toStationId = this.router.snapshot.paramMap.get('toStationId');
    this.loadPath(fromStationId,toStationId);
    this.loadStation();
  }

  loadPath(formStationId,toStationsId){
    this.clientService.findPaths(formStationId,toStationsId).subscribe(res=> this.initPaths(res));
  }

  initPaths(res){
    this.paths = res;
    console.log(this.paths);
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
      this.router2.navigateByUrl('/result/'+fromStationId+'/'+toStationId);
      this.loadPath(fromStationId,toStationId);
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

  display(number){
    if (number == 1 ){
      return 'đi';
    }else{
      return 'về';
    }
  }

}
