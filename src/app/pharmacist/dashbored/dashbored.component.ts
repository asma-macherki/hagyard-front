import { Component, OnInit } from '@angular/core';


@Component({
  selector: 'app-dashbored',
  templateUrl: './dashbored.component.html',
  styleUrls: ['./dashbored.component.css'],

})
export class DashboredComponent implements OnInit {


  show=true;



  constructor() { }

  ngOnInit(): void {
  }

  /*changeStatus(){
    this.show=!this.show;

  }*/


}
