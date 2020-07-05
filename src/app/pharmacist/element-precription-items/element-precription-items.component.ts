import { Component, OnInit,Input  } from '@angular/core';
import {ProductService} from '../../Services/product.service';
import {Element} from'../Models/Element';
import {Product} from'../Models/Product.model';
@Component({
  selector: '[app-element-precription-items]',
  templateUrl: './element-precription-items.component.html',
  styleUrls: ['./element-precription-items.component.css']
})
export class ElementPrecriptionItemsComponent implements OnInit {
  id:any;

  constructor(private productService:ProductService) { }

  ngOnInit(): void {

  }
  product:Product;
  @Input('element') element : Element;




}










