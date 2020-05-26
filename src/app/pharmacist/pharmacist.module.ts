import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { DashboredComponent } from './dashbored/dashbored.component';
import { NavBarComponent } from './nav-bar/nav-bar.component';
import { SideBarComponent } from './side-bar/side-bar.component';
import { HomePageModule } from '../home-page/home-page.module';




@NgModule({
  declarations: [DashboredComponent, NavBarComponent, SideBarComponent],
  imports: [
    CommonModule,
    HomePageModule
  ],
  exports:[
    DashboredComponent
  ]
})
export class PharmacistModule { }
