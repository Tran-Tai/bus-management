import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { Title } from '@angular/platform-browser';
import { StationService } from '../station.service';

@Component({
  selector: 'app-create-station',
  templateUrl: './create-station.component.html',
  styleUrls: ['./create-station.component.scss']
})
export class CreateStationComponent implements OnInit {

  createStationForm:FormGroup
  message:string ;

  constructor(
    private titleService:Title,
    private formBuilder:FormBuilder,
    private stationService:StationService
  ) {
    this.titleService.setTitle('Thêm trạm mới')
  }

  ngOnInit(): void {
    this.createStationForm = this.formBuilder.group({
      name:['',Validators.required]
    })
  }

  addStation(){
    if(this.createStationForm.invalid){
      return this.message = "Vui lòng điền đầy đủ thông tin"
    }

    const {value} = this.createStationForm;

    this.stationService.addStation(value).subscribe(
      res => {
        this.message = "Thêm trạm mới thành công";
        console.log(this.message);
      },
      err =>{
        this.message = "Thêm trạm không thành công, vui lòng thử lại";
        console.log(this.message);
      }
    )
  }

}
