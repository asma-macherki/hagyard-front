import { NgModule, Component } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import{PharmacistModule}from './pharmacist/pharmacist.module';
import {ManageUsersComponent} from './pharmacist/manage-users/manage-users.component';
import {MyAcoountComponent}from'./pharmacist/my-acoount/my-acoount.component';
import {ManageProductComponent} from './pharmacist/manage-product/manage-product.component';
import {EditUserComponent} from './pharmacist/edit-user/edit-user.component';
import {AddUserComponent} from './pharmacist/add-user/add-user.component';
import {AddProductComponent} from './pharmacist/add-product/add-product.component';
import {EditProductComponent} from'./pharmacist/edit-product/edit-product.component';
import{AddElementPrescriptionComponent}from'./pharmacist/add-element-prescription/add-element-prescription.component';
import{ManageOrdersComponent} from'./pharmacist/manage-orders/manage-orders.component';
import {EditPharmacistComponent} from './pharmacist/edit-pharmacist/edit-pharmacist.component';
import{EditElementComponent}from'./pharmacist/edit-element/edit-element.component';
import {OrderDetailsComponent} from './pharmacist/order-details/order-details.component'


const routes: Routes = [
  {
    path:'pharmacist/orders',
    component:ManageOrdersComponent,
  },
  {
    path:'pharmacists/Users',
    component:ManageUsersComponent,
    data:{
      animation:'isRight'
    }
  },
  {
    path:'pharmacist/MyAcount',
    component:MyAcoountComponent,
  },
  {
    path:'pharmacist/Products',
    component:ManageProductComponent,
  },
  {
    path:'pharmacist/editUser/:id',
    component:EditUserComponent,
  },
  {
    path:'pharmacist/edit2User/:id',
    component:EditPharmacistComponent,
  },
  {
    path:'pharmacist/addUser',
    component:AddUserComponent
  },
  {
    path:'pharmacits/addProduct',
    component:AddProductComponent
  },
  {
    path:'pharmacit/editProduct/:id',
    component:EditProductComponent
  },
  {
    path:'pharmacit/addElmenetPrescription/drug/:id',
    component:AddElementPrescriptionComponent
  },
  {
    path:'pharmacist/Products/editElement/:id',
    component:EditElementComponent
  },
  {
    path:'orderDetails',
    component:OrderDetailsComponent
  }
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
