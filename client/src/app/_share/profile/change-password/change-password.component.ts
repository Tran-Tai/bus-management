import { Component, OnInit } from '@angular/core';
import { FormGroup } from '@angular/forms';

@Component({
  selector: 'app-change-password',
  templateUrl: './change-password.component.html',
  styleUrls: ['./change-password.component.scss']
})
export class ChangePasswordComponent implements OnInit {

  ChangePasswordForm: FormGroup

  constructor() { }

  ngOnInit(): void {

  }

}

// import {Component} from '@angular/core'
// import {REACTIVE_FORM_DIRECTIVES, FormBuilder, AbstractControl, FormGroup, 
//     Validators} from '@angular/forms'
// import {PWChangeValidators} from './pw-validators'

// @Component({
//     moduleId: module.id
//     selector: 'pw-change-form',
//     templateUrl: `./pw-change.template.html`,
//     directives: [REACTIVE_FORM_DIRECTIVES]
// })

// export class PWChangeFormComponent {
//     pwChangeForm: FormGroup;

//     // Properties that store paths to FormControls makes our template less verbose
//     current: AbstractControl;
//     newPW: AbstractControl;
//     confirm: AbstractControl;

//     constructor(private fb: FormBuilder) { }
//     ngOnInit() {
//         this.pwChangeForm = this.fb.group({
//             current: ['', Validators.required],
//             newPW: ['', Validators.required],
//             confirm: ['', Validators.required]
//         }, {
//             // Here we create validators to be used for the group as a whole
//             validator: Validators.compose([
//                 PWChangeValidators.newIsNotOld, 
//                 PWChangeValidators.newMatchesConfirm
//             ])
//         );
//         this.current = this.pwChangeForm.controls['current'];
//         this.newPW = this.pwChangeForm.controls['newPW'];
//         this.confirm = this.pwChangeForm.controls['confirm'];
//     }
// }