import { Component, OnInit } from '@angular/core';
import { AbstractControl, FormBuilder, FormGroup, Validators } from '@angular/forms';
import { passwordChangeValidators } from './change-password-validators';

@Component({
  selector: 'app-change-password',
  templateUrl: './change-password.component.html',
  styleUrls: ['./change-password.component.scss']
})
export class ChangePasswordComponent implements OnInit {

  changePasswordForm: FormGroup;
  current: AbstractControl;
  newPassword: AbstractControl;
  confirm: AbstractControl;

  constructor(
    private formBuilder: FormBuilder
  ) { }
  ngOnInit(): void {
    this.changePasswordForm = this.formBuilder.group({
      current: ['', Validators.required],
      newPassword: ['', Validators.required],
      confirm: ['', Validators.required]
    }, {
      validator: Validators.compose([
        passwordChangeValidators.newIsNotOld,
        passwordChangeValidators.newMatchesConfirm
      ])
    }
    );
    this.current = this.changePasswordForm.controls['current'];
    this.newPassword = this.changePasswordForm.controls['newPassword'];
    this.confirm = this.changePasswordForm.controls['confirm'];
  }

}
