import { Component, OnInit } from '@angular/core';
import {FormBuilder,FormGroup,Validators} from'@angular/forms';
import { ActivatedRoute } from '@angular/router';
import {ProductService} from '../../Services/product.service'
import { Product } from '../Models/Product.model';
import{Router} from'@angular/router';
import { NotifierService } from "angular-notifier";
import { NgxSpinnerService } from "ngx-spinner";
@Component({
  selector: 'app-edit-product',
  templateUrl: './edit-product.component.html',
  styleUrls: ['./edit-product.component.css']
})
export class EditProductComponent implements OnInit {

  id:any;
  data:any;

  product=new Product();
  error:String;
  errors:any;
  regForm:FormGroup;
  submitted=false;
  private readonly notifier: NotifierService;

  constructor(private spinner: NgxSpinnerService,private formbuilder:FormBuilder,private route:ActivatedRoute,private productService:ProductService,private router:Router,notifierService: NotifierService) {
    this.notifier = notifierService;
    this.regForm=this.formbuilder.group({

      drugName:['',Validators.required],
      drugTradeName:['',Validators.required]

    }
    );
   }

  ngOnInit(): void {

    this.id=this.route.snapshot.params.id;
    this.getOne();

  }

  get f(){

    return this.regForm.controls;
}


  getOne(){
      this.productService.getOneProduct(this.id).subscribe(res=>{
        this.data=res;
        this.product=this.data;
        console.log(this.product)
      });
  }



  deletProduct(id){
    this.productService.deleteProduct(id).subscribe(res=>{

      this.notifier.show({
        type: "success",
        message: "the product deleted successfully",
      });
      this.router.navigateByUrl('/pharmacist/Products');

    });
  }

  onSubmit(){

    this.submitted=true;

   if(this.regForm.invalid)
   return;

   else{

    this.productService.updateProduct(this.id,this.product).subscribe(res=>{
           console.log(res);

           this.notifier.show({
             type: "success",
             message: "the product updated successfully",
           });
           this.router.navigateByUrl('/pharmacist/Products');

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
       }




 }


}
