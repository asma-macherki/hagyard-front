import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-side-bar',
  templateUrl: './side-bar.component.html',
  styleUrls: ['./side-bar.component.css']
})
export class SideBarComponent implements OnInit {

  isOpen = false;//Pardefaut msakra;
  constructor() { }

  ngOnInit(): void {
  }

  openNav() {
    this.isOpen = true;
  }

  closeNav() {
    this.isOpen = false;
  }


}
