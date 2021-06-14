import { Component, OnInit } from '@angular/core';
import { Title } from '@angular/platform-browser';
import { ActivatedRoute, Router } from '@angular/router';
import { Staff } from 'src/app/_share/models/staff.model';
import { StaffService } from '../staff.service';

@Component({
  selector: 'app-delete-staff',
  templateUrl: './delete-staff.component.html',
  styleUrls: ['./delete-staff.component.scss']
})
export class DeleteStaffComponent implements OnInit {

  staff:Staff;
  message:string;

  constructor(
    private titleService:Title,
    private staffService:StaffService,
    private router:ActivatedRoute,
    private router2:Router
  ) { }

  ngOnInit(): void {
    const id = this.router.snapshot.paramMap.get('id');
    this.staffService.getStaff(id).subscribe(res=> this.staff = res);
  }

  deleteStaff(id){
    this.staffService.deleteStaff(id).subscribe(
      res=> {
        this.message = "Xóa trạm thành công";
        console.log(this.message);
        this.router2.navigateByUrl('/manager/staffs');
      },
      err=> {
        this.message = "Xóa trạm không thành công, vui lòng thử lại";
        console.log(this.message);
      }
    )
  }

}
