import { Identifiers } from '@angular/compiler';
import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { Title } from '@angular/platform-browser';
import { UserService } from '../services/services/user.service';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.scss']
})
export class LoginComponent implements OnInit {

  loginForm: FormGroup;
  message: string;
  UserServices: any;
  
  constructor(
    private formBuilder: FormBuilder,
    private title:Title,
    private userService: UserService
  ) {
    this.title.setTitle('ĐĂNG NHẬP')
   }

  ngOnInit(): void {
    this.loginForm = this.formBuilder.group(
      {
        user_name : ['',Validators.required],
        password : ['',Validators.required]
      }
    )
  }

  login(){
    if(this.loginForm.invalid){
      this.message = "Vui lòng điền đầy đủ thông tin";
      return console.log(this.message);
    }

    const {value} = this.loginForm;
    console.log(value)

    this.userService.login(value).subscribe(
      res => {
        this.message = "Đăng nhập thành công";
        console.log(this.message);
      },
      err =>{
        this.message = "Đăng nhập thất bại";
        console.log(this.message);
      }
    )

  }

}
