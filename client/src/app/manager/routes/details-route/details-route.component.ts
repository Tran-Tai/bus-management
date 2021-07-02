import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormControl, FormGroup, Validators } from '@angular/forms';
import { ActivatedRoute, Router } from '@angular/router';
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

  constructor(
    private formBuilder:FormBuilder,
    private routeService:RouteService,
    private router:ActivatedRoute,
    private router2:Router
  ) { }

  ngOnInit(): void {
    this.loadStation();
    const id = this.router.snapshot.paramMap.get('id');
    this.routeService.getRoute(id).subscribe(res=>this.initData(res));
    this.firstRouteForm = this.formBuilder.group({
      number:['',Validators.required],
      station_id:['',Validators.required],
      minute:['',Validators.required]
    });

  }

  initData(res){
    this.data = res;
    this.route = this.data.route;
    this.first_route_stations = this.data.first_route_stations;
    this.second_route_stations = this.data.second_route_stations;
  }

  createRoute(id,direction){
    this.routeService.createRoute(id,direction).subscribe(
      res => this.router2.navigateByUrl('./'),
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

  loadStation(){
    this.routeService.getListStation().subscribe(res=>this.getStations(res));
  }

  addStation(){
  }

  changefirstRoute(){
    this.firstRoute = !this.firstRoute
  }
}
