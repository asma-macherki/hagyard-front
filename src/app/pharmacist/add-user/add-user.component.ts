import { Component, OnInit } from '@angular/core';
import {FormBuilder,FormGroup,Validators} from'@angular/forms';
import Swal from'sweetalert2';
import {pharmacistService} from '../../Services/pharmacist.service';
import {Pharmacist} from '../Models/Pharmacist';
import { NotifierService } from "angular-notifier";
import{Router} from'@angular/router';
import { NgxSpinnerService } from "ngx-spinner";




@Component({
  selector: 'app-add-user',
  templateUrl: './add-user.component.html',
  styleUrls: ['./add-user.component.css']
})
export class AddUserComponent implements OnInit {

  regForm:FormGroup;
  submitted=false;
  error:String;
  errors:any;

  pharmacist={

    email:null,
    firstName:null,
    lastName:null,
    actif:true,
    dateOfBirth:null,
    gender:null,
    phone:null,
    country:null,
    state:null,
    city:null,
    postalCode:null,
    admin:0,
    pharmacy_id:1

  }
  private readonly notifier: NotifierService;
  isLoading=false;


  constructor(private spinner: NgxSpinnerService,private formbuilder:FormBuilder,private pharmacistService:pharmacistService, notifierService: NotifierService,private router:Router) {

    this.regForm=this.formbuilder.group({
      firstname:['',Validators.required],
      lastname:['',Validators.required],
      date:['',Validators.required],
      optradio:['',Validators.required],
      email:['', [Validators.required, Validators.email]],
      phone:['', [Validators.required, Validators.pattern("^[0-9]*$"),Validators.minLength(8)]],
      address:['',Validators.required],
      city:['',Validators.required],
      state:['',Validators.required],
      zip:['', [Validators.required, Validators.pattern("^[0-9]*$"),Validators.minLength(4)]],
      admin:['']
    });

    this.notifier = notifierService;

  }

  ngOnInit(): void {

  }

  get f(){

      return this.regForm.controls;
  }

  onSubmit(){

    console.log(this.pharmacist);

    this.submitted=true;

        this.isLoading=true;

         this.pharmacistService.insertUser(this.pharmacist).subscribe(res=>{
           console.log(res);

           this.notifier.show({
             type: "success",
             message: "the user  created successfully",
           });
           this.router.navigateByUrl('/pharmacists/Users');

         },(error)=>{

           console.error(error)
           if(error.error.message) {

             this.error=error.error.message;
             console.log(error);
           }
             else {
             this.errors=error.error;
             }

          });

          this.spinner.show();
          setTimeout(() => {

            this.spinner.hide();
          }, 3000);


 }

onChange(isChecked: boolean) {

  if (isChecked) {
   console.log('cheked');
   this.pharmacist.admin=1 ;
   console.log( this.pharmacist.admin);
} else{
  console.log('not cheked');
  this.pharmacist.admin=0 ;
  console.log( this.pharmacist.admin);
}
}
 change(e){
   //this.pharmacist.state=value ;
   this.regForm.get("state").setValue(e.target.value,{
     onlySelf:true
   })
 }

  onReset() {
    this.submitted = false;
    this.regForm.reset();
}

gender(num){
  if(num===1){
    this.pharmacist.gender="male";
  }
  else if(num===0){
  this.pharmacist.gender="female";
  }
}



}
