import { Component, OnInit,ViewChild, ElementRef } from '@angular/core';
import {ProductService} from '../../Services/product.service';
import { NotifierService } from 'angular-notifier';

@Component({
  selector: 'app-manage-product',
  templateUrl: './manage-product.component.html',
  styleUrls: ['./manage-product.component.css']
})
export class ManageProductComponent implements OnInit {

  newPlacehold="search by"
  products=null;
  data:any;
  show=false ;
  link=null;

  form={
  'field':null ,
  'searchQuery':null
  }

  visible=false;
  disp=true;
  backurl =null ;


  currentPage=1;
  numberPage=[];


  @ViewChild('searchSelect') field: ElementRef;
  @ViewChild('searchInput') searchQuery: ElementRef;

  constructor(private productService:ProductService, private notifier:NotifierService) { }

  ngOnInit(): void {
    this.getProducts();
  }

  getProducts(){

    this.productService.getProducts().subscribe(res=>{
      console.log(res);
      this.products=res;
      this.link=this.products.next_page_url;

      console.log(this.link);
      this.backurl=this.products.prev_page_url;

      this.currentPage=this.products.current_page;
      this.numberPage.length=this.products.last_page;

     this.products=this.products.data;





    })
  };

  open($id){

      console.log("hello");
      this.show=true ;
  }

  change(num) {

        if(num==='1'){

            this.newPlacehold="Search by prodcut Name"
            this.form.field='ProductName';

        }else if(num==='2'){

            this.newPlacehold='search by trade Name';
            this.form.field='TradeName'
        }else

          this.newPlacehold='Search by'
  }


  exit(){
    this.ngOnInit();
    this.change('0');
    this.field.nativeElement.value='0';
    this.searchQuery.nativeElement="Serch by";
    this.newPlacehold="search by"

  }
  find(){

  console.log(this.form)
  this.productService.searchProduct(this.form).subscribe(res=>{
  this.products=res;
  this.link=this.products.next_page_url;
  this.backurl=this.products.prev_page_url;
  this.currentPage=this.products.current_page;
  this.numberPage.length=this.products.last_page;

  this.products=this.products.data;

  });
}

  nextPage(){

  this.visible=true;
  this.products=null;
  console.log(this.link);
  this.productService.getMoreProduct(this.link).subscribe(res=>{
   this.products=res;
   this.link=this.products.next_page_url;
   this.backurl=this.products.prev_page_url;

   this.currentPage=this.products.current_page;

   this.products=this.products.data;

    if(this.link===null){
    this.disp=false;
  }
});
}


  backPage(){

  this.products=null;


  this.productService.getMoreProduct(this.backurl).subscribe(res=>{

   this.products=res;

   this.link=this.products.next_page_url;
   console.log(this.link)
   this.backurl=this.products.prev_page_url;

   this.currentPage=this.products.current_page;

   this.products=this.products.data;
   if(this.backurl===null){

    this.visible=false ;
      this.disp=true ;
  }
});
}


}
