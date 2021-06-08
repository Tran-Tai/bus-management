import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { Title } from '@angular/platform-browser';
import { ActivatedRoute, Router } from '@angular/router';
import { Station } from 'src/app/_share/models/station.model';
import { StationService } from '../station.service';

@Component({
  selector: 'app-details-station',
  templateUrl: './details-station.component.html',
  styleUrls: ['./details-station.component.scss']
})
export class DetailsStationComponent implements OnInit {

  station:Station;
  detailsStationForm:FormGroup;

  constructor(
    private titleService:Title,
    private router:ActivatedRoute,
    private stationService:StationService,
    private formBuilder:FormBuilder,
    private router2:Router

  ) {
    this.titleService.setTitle('Chi tiết trạm')
  }

  ngOnInit(): void {
    const id = this.router.snapshot.paramMap.get('id');
    this.stationService.getStation(id).subscribe(res=>this.station = res);
    this.initForm();
    this.stationService.getStation(id).subscribe(res=>this.pathStationFormValue(res));
  }

  initForm(){
    this.detailsStationForm = this.formBuilder.group({
      name:['',[Validators.required]]
    })
  }

  pathStationFormValue(station:Station){
    this.detailsStationForm.patchValue({
      name : station.name
    })
  }


}
