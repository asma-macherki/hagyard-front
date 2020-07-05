import { Component, OnInit, Input } from '@angular/core';
import {ProductService} from '../../Services/product.service';
import { Product } from '../Models/Product.model';

import {Element} from '../Models/Element'




@Component({
  selector: '[app-product-item]',
  templateUrl: './product-item.component.html',
  styleUrls: ['./product-item.component.css']
})
export class ProductItemComponent implements OnInit {

  prescriptions : [Element];
  show=false;
  id:any;
  @Input('product') product : Product;

  constructor(private productService:ProductService) {}

  ngOnInit(): void {

  }
  open(id){
    this.show=true;
    this.getElementPrescriptions(id);
  }

  close(){
    this.show=false;
  }

  getElementPrescriptions($id){

    var test:any;
    this.productService.getElementPrescriptionByDrug($id).subscribe(res=>{
    console.log(res);
    test=res;
    this.prescriptions=test;

    for(var i=0; i<this.prescriptions.length;i++) {

       console.log(this.prescriptions[i].gpCode)
    }
  })
}










}
