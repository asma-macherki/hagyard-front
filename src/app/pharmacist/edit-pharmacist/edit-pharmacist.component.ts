import { Component, OnInit } from '@angular/core';
import{ Pharmacist } from '../Models/Pharmacist';
import {pharmacistService} from '../../Services/pharmacist.service';
import{Router} from'@angular/router';
import { NotifierService } from "angular-notifier";
import {FormBuilder,FormGroup,Validators} from'@angular/forms';
import { ActivatedRoute } from '@angular/router';
import { NgxSpinnerService } from "ngx-spinner";


@Component({
  selector: 'app-edit-pharmacist',
  templateUrl: './edit-pharmacist.component.html',
  styleUrls: ['./edit-pharmacist.component.css']
})
export class EditPharmacistComponent implements OnInit {


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
  id:any;
  data:any;
  private readonly notifier: NotifierService;
  regForm:FormGroup;
  submitted=false;
  error:String;
  errors=null;
  lastName:null;
  cheked=false;
  selectorAdmin:any;
  isLoading=false;

  constructor(private spinner: NgxSpinnerService,notifierService: NotifierService, private formbuilder:FormBuilder,private router:Router,private route:ActivatedRoute,private pharmacistService:pharmacistService) {
    this.notifier = notifierService;
    this.regForm=this.formbuilder.group({

      firstName:['',Validators.required],
      lastName:['',Validators.required],
      dateOfBirth:['',Validators.required],
      phone:['',Validators.required],
      email:['',Validators.required],
      country:['',Validators.required],
      state:['',Validators.required],
      city:['',Validators.required],
      postalCode:['',Validators.required],
      admin:['']
    }
    );
   }

  ngOnInit(): void {
    this.id=this.route.snapshot.params.id;
    this.findOne();

  }

  findOne(){

    this.pharmacistService.findOneUser(this.id).subscribe(res=>{
      this.data=res;
      console.log(res);
      this.pharmacist=this.data;
      console.log(this.pharmacist)
      this.selectorAdmin=this.pharmacist.admin;
      console.log(this.selectorAdmin)
      if (this.selectorAdmin===1){
        this.cheked=true;
      }
      else if(this.selectorAdmin===0){
        this.cheked=false;
      }
    })
  }

  get f(){

    return this.regForm.controls;
  }

  onSubmit(){

    this.submitted=true;
    this.isLoading=true;
  console.log(this.pharmacist)
    /*if(this.regForm.invalid)
  return;*/
  // else{

    this.pharmacistService.updateUser(this.id,this.pharmacist).subscribe(res=>{
           console.log(res);

            this.notifier.show({
             type: "success",
             message: "the product updated successfully",
           });
           this.router.navigateByUrl('/pharmacists/Users');

         },(error)=>{
           console.error(error.error)
           if(error.error.message) {
             this.error=error.error.message;
           }
             else {

             console.log(error.error);
             this.errors=error.error;
             }

          });
          this.spinner.show();
          setTimeout(() => {
            this.spinner.hide();
          }, 3000);
      // }
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


}
