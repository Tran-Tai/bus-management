import { Component, OnInit } from '@angular/core';
import { Title } from '@angular/platform-browser';
import { Staff } from 'src/app/_share/models/staff.model';
import { StaffService } from '../staff.service';

@Component({
  selector: 'app-list-staff',
  templateUrl: './list-staff.component.html',
  styleUrls: ['./list-staff.component.scss']
})
export class ListStaffComponent implements OnInit {

  staffs:Array<Staff> = [];

  constructor(
    private titleService:Title,
    private staffService:StaffService
  ) {
    this.titleService.setTitle("Danh sách nhân viên");
  }

  ngOnInit(): void {
    this.loadStaff();
  }

  loadStaff():void{
    this.staffService.getList().subscribe(res=>this.staffs = res);
  }

}
