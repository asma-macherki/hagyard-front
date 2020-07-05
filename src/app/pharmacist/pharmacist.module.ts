import { NgModule } from '@angular/core';
import {RouterOutlet, ROUTES} from '@angular/router';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import { BrowserModule } from '@angular/platform-browser';
import { CommonModule } from '@angular/common';
import {AppRoutingModule} from '../app-routing.module';
import { DashboredComponent } from './dashbored/dashbored.component';
import { HomePageModule } from '../home-page/home-page.module';
import { ManageUsersComponent } from './manage-users/manage-users.component';
import { ManageProductsComponent } from './manage-products/manage-products.component';
import { MyAcoountComponent } from './my-acoount/my-acoount.component';
import { FooterPharmacistComponent } from './footer-pharmacist/footer-pharmacist.component';
import {SidNavComponent} from'./sid-nav/sid-nav.component';
import {TopnavComponent} from'./topnav/topnav.component';
import { EditUserComponent } from './edit-user/edit-user.component';
import { AddUserComponent } from './add-user/add-user.component';
import { AddProductComponent } from './add-product/add-product.component';
import { EditProductComponent } from './edit-product/edit-product.component';
import { AddElementPrescriptionComponent } from './add-element-prescription/add-element-prescription.component';
import { ManageOrdersComponent } from './manage-orders/manage-orders.component';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations';
import { BsDatepickerModule } from 'ngx-bootstrap/datepicker';

import {HttpClientModule} from '@angular/common/http';

import { NotifierModule } from "angular-notifier";
import {NgbPaginationModule, NgbAlertModule} from '@ng-bootstrap/ng-bootstrap';
import { ProductItemComponent } from './product-item/product-item.component';
import { ManageProductComponent } from './manage-product/manage-product.component';
import { ElementPrecriptionItemsComponent } from './element-precription-items/element-precription-items.component';

import { NgxSpinnerModule } from "ngx-spinner";
import { EditPharmacistComponent } from './edit-pharmacist/edit-pharmacist.component';
import { EditElementComponent } from './edit-element/edit-element.component';
import { OrderHistoryComponent } from './order-history/order-history.component';
import { OrderDetailsComponent } from './order-details/order-details.component';







@NgModule({

  declarations: [DashboredComponent, SidNavComponent, TopnavComponent, ManageUsersComponent, ManageProductsComponent, MyAcoountComponent, FooterPharmacistComponent, EditUserComponent, AddUserComponent, AddProductComponent, EditProductComponent, AddElementPrescriptionComponent, ManageOrdersComponent, ProductItemComponent, ManageProductComponent, ElementPrecriptionItemsComponent, EditPharmacistComponent, EditElementComponent, OrderHistoryComponent, OrderDetailsComponent],
  imports: [
    CommonModule,
    HomePageModule,
    AppRoutingModule,
    BrowserAnimationsModule,
    BsDatepickerModule.forRoot(),
    ReactiveFormsModule,
    FormsModule,
    BrowserModule,
    HttpClientModule,
    NotifierModule,
    NgbPaginationModule,
    NgbAlertModule,
    NgxSpinnerModule

  ],
  exports:[
    DashboredComponent
  ]
})
export class PharmacistModule { }
