import { Component, OnInit } from '@angular/core';
//import {FormGroup,FormControl,Validators} from '@angular/forms';

@Component({
  selector: 'app-my-acoount',
  templateUrl: './my-acoount.component.html',
  styleUrls: ['./my-acoount.component.css']
})
export class MyAcoountComponent implements OnInit {

 /* form=new FormGroup({
    first_name:new FormControl('',Validators.required)
  });*/

  show=true;


  constructor() { }

  ngOnInit(): void {
  }

  changeStatus(){
    this.show=!this.show;
  }





}
