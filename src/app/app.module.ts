import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import{PharmacistModule}from './pharmacist/pharmacist.module';
import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { HomePageModule } from './home-page/home-page.module';
import { animation } from '@angular/animations';
import { BsDatepickerModule } from 'ngx-bootstrap/datepicker';
import { ReactiveFormsModule, FormsModule } from '@angular/forms';
import { NgbModule } from '@ng-bootstrap/ng-bootstrap';
import { NotifierModule } from "angular-notifier";


@NgModule({
  declarations: [
    AppComponent,

  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    PharmacistModule,
    HomePageModule,
    ReactiveFormsModule,
    FormsModule,
    BsDatepickerModule.forRoot(),
    NgbModule, NotifierModule
  ],
  exports:[
    AppRoutingModule,

  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
