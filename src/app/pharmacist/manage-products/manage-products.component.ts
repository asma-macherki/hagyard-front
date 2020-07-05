import { Component, OnInit ,ViewChild, ElementRef } from '@angular/core';
import {ProductService} from '../../Services/product.service';


@Component({
  selector: 'app-manage-products',
  templateUrl: './manage-products.component.html',
  styleUrls: ['./manage-products.component.css']
})

export class ManageProductsComponent implements OnInit {
  backurl =null ;
  show=true;
  product=null;
  test=null;
  search=null;
  newPlaceHolder="search by";
  id:any;
  prescriptions=null;

  @ViewChild('searchInput') searchInput: ElementRef;
  @ViewChild('searchSelect') searchHi: ElementRef;
  link=null;

  visible=false;
  disp=true;

  constructor(private productService:ProductService) { }

  ngOnInit(): void {
    this.getProducts();
  }

  getProducts(){

    var test: any;
    this.productService.getProducts().subscribe(res=>{
      console.log(res);
      this.product=res ;
      this.link=this.product.next_page_url;
      this.backurl=this.product.prev_page_url
      console.log(this.link)
      console.log(this.backurl)
      this.product=this.product.data ;

      console.log(this.product)
      for(var j=0; j<this.product.length;j++)
      {
        console.log(this.product[j].id)}
    })

  }

nextPage(){

  this.visible=true;
  this.product=null;
  console.log(this.link);
  this.productService.getMoreProduct(this.link).subscribe(res=>{

    console.log(res);
   this.product=res;
   this.link=this.product.next_page_url;
   this.backurl=this.product.prev_page_url;
   this.product=this.product.data;

    if(this.link===null){
    this.disp=false;
  }




 })
}

backPage(){
  this.product=null;
  console.log(this.backurl);
  // console.log(this.link);
  this.productService.getMoreProduct(this.backurl).subscribe(res=>{

    console.log(res);
   this.product=res;
   this.link=this.product.next_page_url;
   console.log(this.link)
   this.backurl=this.product.prev_page_url;;
   this.product=this.product.data;
   if(this.backurl===null){
      this.visible=false ;
      this.disp=true ;
}
});}



  getElementPrescriptions($id){

      var test:any;
      this.productService.getElementPrescriptionByDrug($id).subscribe(res=>{
      console.log(res);
      test=res;
      this.prescriptions=test;

      for(var i=0; i<this.prescriptions.length;i++) {

         console.log(this.prescriptions[i].id)
      }
    })
  }

  open($id){

    this.show=!this.show;
   this.getElementPrescriptions($id);
    console.log($id);
  }

  close(){
    this.show=true;
  }


  /*find(){

    this.productSearch=this.product;
    if(this.test==='drugName'){

      if (this.search!== '') {
          this.productSearch = this.productSearch.filter(res => {
            return res.drugName.toLowerCase().match(this.search.toLowerCase());
          });
      } else if (this.search === '') {
        this.ngOnInit();
      }

  }else if(this.test==='TdrugradeName'){
      if (this.search!== '') {
          this.productSearch= this.productSearch.filter(res => {
            return res.drugTradeName.toLowerCase().match(this.search.toLowerCase());
          });
      } else if (this.search === '') {

            this.ngOnInit();
      }
}
 }

  change(num){

    if(num==='1'){

        this.test='Name'
        // console.log(this.form.current_weight_unit);
        console.log('name')
       this.ngOnInit();
        this. productSearch=this.product ;
        this.newPlaceHolder="product name"
     }
     else if(num==='2')  {

      this.test='Trade Name';
      console.log('Trade Name')
      this.ngOnInit();
      this. productSearch=this.product ;
      this.newPlaceHolder="trade name"
    }
    else{

      this.test=null ;
      this.ngOnInit();
      this.productSearch=this.product ;
    }
  }*/

 /* Exit() {

    this.search=null ;
    this.ngOnInit();
    this.productSearch=this.product ;
    this.change('0');
    this.searchInput.nativeElement.value = '';
    this.searchHi.nativeElement.value='0'
    this.newPlaceHolder= "Search by ";
  }*/

}

