import { Component, OnInit } from '@angular/core';
import {ElementPrescriptionService} from '../../Services/element-prescription.service';
import {FormBuilder,FormGroup,Validators} from'@angular/forms';
import { NotifierService } from "angular-notifier";
import{Router} from'@angular/router';
import {Element} from '../Models/Element';
import { ActivatedRoute } from '@angular/router';
import { NgxSpinnerService } from "ngx-spinner";
@Component({
  selector: 'app-add-element-prescription',
  templateUrl: './add-element-prescription.component.html',
  styleUrls: ['./add-element-prescription.component.css']
})
export class AddElementPrescriptionComponent implements OnInit {
  regForm:FormGroup;
  submitted=false;
  private readonly notifier: NotifierService;
  element=new Element();
  error:String;
  errors:any;
  drugId:any;



  constructor(private spinner: NgxSpinnerService,private route:ActivatedRoute,private formbuilder:FormBuilder,private elementService:ElementPrescriptionService,notifierService: NotifierService,private router:Router ) {

    this.notifier = notifierService;
    this.regForm=this.formbuilder.group({

      drugType:['',Validators.required],
      drugForm:['',Validators.required],
      drugStrength:['',Validators.required],
      size:['',Validators.required],
      price:['',Validators.required]

    }
    );
  }

  ngOnInit(): void {
    this.drugId=this.route.snapshot.params.id;
    this.element.drug_id=this.drugId;
    console.log(this.drugId);

  }

  get f(){
    return this.regForm.controls;
  }

  onSubmit(){

    this.submitted=true;

    console.log(this.regForm);

         this.elementService.insertElementPrescription(this.element).subscribe(res=>{
           console.log(res);
           this.notifier.show({
             type: "success",
             message: "the element prescritpion created successfully",
           });
           this.router.navigateByUrl('/pharmacist/Products');

         },(error)=>{

           console.error(error)
           if(error.error.message) {

             this.error=error.error.message;
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



}
