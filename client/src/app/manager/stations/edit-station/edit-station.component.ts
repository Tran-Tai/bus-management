import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { Title } from '@angular/platform-browser';
import { ActivatedRoute } from '@angular/router';
import { Station } from 'src/app/_share/models/station.model';
import { StationService } from '../station.service';

@Component({
  selector: 'app-edit-station',
  templateUrl: './edit-station.component.html',
  styleUrls: ['./edit-station.component.scss']
})
export class EditStationComponent implements OnInit {

  station:Station;
  editStationForm:FormGroup;
  message:string;

  constructor(
    private titleService:Title,
    private stationService:StationService,
    private router:ActivatedRoute,
    private formBuilder:FormBuilder

  ) {
    this.titleService.setTitle('Chỉnh sửa trạm')
   }

  ngOnInit(): void {
    const id = this.router.snapshot.paramMap.get('id');
    this.stationService.getStation(id).subscribe(res=>this.station = res);
    this.initForm();
    this.stationService.getStation(id).subscribe(res=>this.pathStationFormValue(res));
  }

  initForm(){
    this.editStationForm = this.formBuilder.group({
      name:['',[Validators.required]]
    })
  }

  pathStationFormValue(station:Station){
    this.editStationForm.patchValue({
      name : station.name
    })
  }

  updateStation(){
    if(this.editStationForm.invalid){
      return this.message = "Vui lòng kiểm tra lại thông tin";
    }


    const {value} = this.editStationForm;

    const id = this.router.snapshot.paramMap.get('id');

    this.stationService.updateStation(id,value).subscribe(
      res => {
        this.message = "Sửa thông tin trạm thành công";
        console.log(this.message);
      },
      err=>{
        this.message = "Sửa thông tin trạm không thành công, vui lòng thử lại!";
        console.log(this.message);
      }
    )
  }

}
