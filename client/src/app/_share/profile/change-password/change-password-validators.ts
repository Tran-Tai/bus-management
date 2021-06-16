import {FormControl, FormGroup} from '@angular/forms'
export class passwordChangeValidators{
    static oldPassword: any;
   
    
    static oldPasswordMustBeCorrect(control: FormControl){
        var invalid = false;
        if (control.value != passwordChangeValidators.oldPassword)
            return { oldPasswordMustBeCorrect : true}
        return null;
    }

    static newIsNotOld(group: FormGroup){
        var newPassword = group.controls['newPassword'];
        if(group.controls['current'].value == newPassword.value)
            newPassword.setErrors({ newIsNotOld: true});
        return null;
    }

    static newMatchesConfirm(group: FormGroup){
        var confirm = group.controls['confirm'];
        if(group.controls['newPassword'].value !== confirm.value)
            confirm.setErrors({ newMatchesConfirm: true});
        return null;
    }
}