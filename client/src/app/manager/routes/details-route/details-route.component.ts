import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormControl, FormGroup, Validators } from '@angular/forms';
import { ActivatedRoute} from '@angular/router';
import { Observable } from 'rxjs';
import { map, startWith } from 'rxjs/operators';
import { Route } from 'src/app/_share/models/route.model';
import { RouteData } from 'src/app/_share/models/routeData.model';
import { Station } from 'src/app/_share/models/station.model';
import { RouteService } from '../route.service';

@Component({
  selector: 'app-details-route',
  templateUrl: './details-route.component.html',
  styleUrls: ['./details-route.component.scss']
})
export class DetailsRouteComponent implements OnInit {

  data: RouteData;
  route:Route;
  first_route_stations : Array<Station>;
  second_route_stations: Array<Station>;
  firstRouteForm: FormGroup;
  secondRouteForm: FormGroup;

  firstRouteControl = new FormControl();
  firstStationId: number;
  fromoptions : Array<Station> = [];
  filteredOptions : Observable<Station[]>;
  firstRoute : boolean = true;
  firstRouteNumber : number ;

  secondRouteControl = new FormControl();
  secondStationId: number;
  secondoptions : Array<Station> = [];
  filteredOptions_2 : Observable<Station[]>;
  secondRoute : boolean = true;
  secondRouteNumber : number ;

  constructor(
    private formBuilder:FormBuilder,
    private routeService:RouteService,
    private router:ActivatedRoute,
  ) { }

  ngOnInit(): void {
    this.loadStation();
    const id = this.router.snapshot.paramMap.get('id');
    this.routeService.getRoute(id).subscribe(res=>this.initData(res));
    this.firstRouteForm = this.formBuilder.group({
      station_id :  ['',Validators.required],
      minute:       ['',Validators.required]
    });

    this.secondRouteForm = this.formBuilder.group({
      station_id :  ['',Validators.required],
      minute:       ['',Validators.required]
    })
  }

  initData(res){
    this.data = res;
    this.route = this.data.route;
    this.first_route_stations = this.data.first_route_stations;
    this.firstRouteNumber = this.first_route_stations.length+1;
    this.second_route_stations = this.data.second_route_stations;
  }

  createRoute(id,direction){
    this.routeService.createRoute(id,direction).subscribe(
      res => window.location.reload(),
      err => alert('Thêm không thành công')
    )
  }

  getStations(res){
    this.fromoptions = res;
    this.filteredOptions = this.firstRouteControl.valueChanges
      .pipe(
        startWith(''),
        map(value => typeof value === 'string' ? value : value.name),
        map(name => name ? this._filter(name) : this.fromoptions.slice())
      );
  }

  private _filter(name: string): Array<Station> {
    const filterValue = name.toLowerCase();
    return this.fromoptions.filter(option => option.name.toLowerCase().includes(filterValue));
  }

  getFromId(id){
    this.firstStationId = id;
  }

  displayFn(station: Station): string {
    return station && station.name ? station.name : '';
  }

  addStation(){

    this.firstRouteForm.get("station_id").setValue(this.firstStationId);

    if(this.firstRouteForm.invalid){
      return alert('Vui lòng điền đầy đủ thông tin');
    }

    const {value} = this.firstRouteForm;
    this.routeService.addStationToRoute(this.route.first_route_id,this.firstRouteNumber, value).subscribe(
      res => window.location.reload(),
      err => alert('Thêm không thành công')
    )
  }

  changeFirstRouteNumber(value){
    this.firstRouteNumber = value;
  }

  changefirstRoute(){
    this.firstRoute = !this.firstRoute
  }

  getStations_2(res){
    this.secondoptions = res;
    this.filteredOptions_2 = this.secondRouteControl.valueChanges
      .pipe(
        startWith(''),
        map(value => typeof value === 'string' ? value : value.name),
        map(name => name ? this._filter2(name) : this.secondoptions.slice())
      );
  }

  private _filter2(name: string): Array<Station> {
    const filterValue = name.toLowerCase();
    return this.secondoptions.filter(option => option.name.toLowerCase().includes(filterValue));
  }

  getToId(id){
    this.secondStationId = id;
  }

  loadStation(){
    this.routeService.getListStation().subscribe(res=>this.getStations(res));
  }

  addStation2(){

    this.secondRouteForm.get("station_id").setValue(this.secondStationId);

    if(this.secondRouteForm.invalid){
      return alert('Vui lòng điền đầy đủ thông tin');
    }

    const {value} = this.secondRouteForm;
    this.routeService.addStationToRoute(this.route.second_route_id,this.secondRouteNumber, value).subscribe(
      res => window.location.reload(),
      err => alert('Thêm không thành công')
    )
  }

  changeSecondRouteNumber(value){
    this.secondRouteNumber = value;
  }

  changesecondRoute(){
    this.secondRoute = !this.secondRoute
  }
}
