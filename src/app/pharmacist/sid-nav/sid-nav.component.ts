import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-sid-nav',
  templateUrl: './sid-nav.component.html',
  styleUrls: ['./sid-nav.component.css']
})
export class SidNavComponent implements OnInit {
  isOpen = false;

  constructor() { }

  ngOnInit(): void {
  }


closeNav() {
  this.isOpen = false;
}

}
