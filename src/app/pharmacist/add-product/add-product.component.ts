import { Component, OnInit } from '@angular/core';
import {FormBuilder,FormGroup,Validators} from'@angular/forms';
import {ProductService} from '../../Services/product.service';
import { NotifierService } from "angular-notifier";
import{Router} from'@angular/router';
import { Route } from '@angular/compiler/src/core';
import { Product } from '../Models/Product.model';
import { NgxSpinnerService } from "ngx-spinner";


@Component({
  selector: 'app-add-product',
  templateUrl: './add-product.component.html',
  styleUrls: ['./add-product.component.css']
})
export class AddProductComponent implements OnInit {

  regForm:FormGroup;
  submitted=false;
  Product=new Product();
  error:String;
  errors:any;

 private readonly notifier: NotifierService;

  constructor(private spinner: NgxSpinnerService,private formbuilder:FormBuilder,private productService:ProductService, notifierService: NotifierService,private router:Router) {
    this.notifier = notifierService;
    this.regForm=this.formbuilder.group({

      drugName:['',Validators.required],
      drugTradeName:['',Validators.required]

    }
    );
  }

  ngOnInit(): void {

  }

  get f(){
    return this.regForm.controls;
  }

onSubmit(){

  this.submitted=true;


  if(this.regForm.invalid)
  return;

  else{

        this.productService.insertProduct(this.Product).subscribe(res=>{
          console.log(res);

          this.notifier.show({
            type: "success",
            message: "the product created successfully",
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
onReset() {

    this.submitted = false;
    this.regForm.reset();
}


}





