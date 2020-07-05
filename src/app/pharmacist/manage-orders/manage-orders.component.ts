import { Component, OnInit,ViewChild, ElementRef } from '@angular/core';

@Component({
  selector: 'app-manage-orders',
  templateUrl: './manage-orders.component.html',
  styleUrls: ['./manage-orders.component.css']
})
export class ManageOrdersComponent implements OnInit {
  newPlacehold="search by";
  display=false;
  form={
    'field':null ,
    'searchQuery':null
    }

    @ViewChild('searchSelect') field: ElementRef;
  @ViewChild('searchInput') searchQuery: ElementRef;
  constructor() { }

  ngOnInit(): void {
  }

  change(num) {
    switch(num) {
      case '1': {
        this.newPlacehold="Search by Order #"
         break;
      }
      case '2': {
        this.newPlacehold='Select Status';
        this.display=true;
         break;
      }
      case'3':{
        this.newPlacehold='Search by Pet Owner';
        break;
      }
      case'4':{
        this.newPlacehold='Search by Patient Name';
        break;
      }
      case'5':{
        this.newPlacehold='Search by Vet Name';
        break;
      }
      case'6':{
        this.newPlacehold='Search by Vet Email';
        break;
      }
      case'7':{
        this.newPlacehold='Search by Order Date';
        break;
      }
      default: {
          this.newPlacehold='Search by';
         break;
      }
    }
  }


  exit(){
    this.ngOnInit();
    this.change('0');
    this.field.nativeElement.value='0';
    this.newPlacehold="search by";
  }
}
