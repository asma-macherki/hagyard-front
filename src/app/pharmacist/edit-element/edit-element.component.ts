import { Component, OnInit } from '@angular/core';
import {ElementPrescriptionService} from '../../Services/element-prescription.service';
import {FormBuilder,FormGroup,Validators} from'@angular/forms';
import { NotifierService } from "angular-notifier";
import{Router} from'@angular/router';
import {Element} from '../Models/Element';
import { NgxSpinnerService } from "ngx-spinner";
import { ActivatedRoute } from '@angular/router';

@Component({
  selector: 'app-edit-element',
  templateUrl: './edit-element.component.html',
  styleUrls: ['./edit-element.component.css']
})
export class EditElementComponent implements OnInit {
  regForm:FormGroup;
  submitted=false;
  private readonly notifier: NotifierService;
  element=new Element();
  error:String;
  errors:any;
  drug:any;
  id:any;
  data:any;
  Type:null;
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
    this.id=this.route.snapshot.params.id;
    this.findOneElement();
  }

  get f(){
    return this.regForm.controls;
  }

  findOneElement(){
    this.elementService.findOneElement(this.id).subscribe(res=>{
      console.log(res);
      this.data=res;
      this.element=this.data;
      this.drug=this.element.drug_id;
      this.element.drug_id=this.drug;
    })
  }

  onSubmit(){

    this.submitted=true;

    console.log(this.regForm);

    console.log(this.element);
         this.elementService.updateElementPrescription(this.id,this.element).subscribe(res=>{
           console.log(res);
           this.notifier.show({
             type: "success",
             message: "the element prescritpion updated successfully",
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

  deletElement(id){
    this.elementService.deleteElementPrescription(id).subscribe(res=>{

      this.notifier.show({
        type: "success",
        message: "the element prescription deleted successfully",
      });
      this.router.navigateByUrl('/pharmacist/Products');

    });


    this.spinner.show();
    setTimeout(() => {

      this.spinner.hide();
    }, 3000);
  }


}
