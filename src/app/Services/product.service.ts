import { Injectable } from '@angular/core';
import { HttpClient}from '@angular/common/http';
import {catchError} from 'rxjs/operators';
import {observable,throwError} from 'rxjs'

@Injectable({
  providedIn: 'root'
})
export class ProductService {

  constructor(private httpClient:HttpClient) { }

  getProducts(){

   return  this.httpClient.get("http://backendpapp.test:8800/api/drugs");
  }

  getElementPrescriptionByDrug(id){

    return this.httpClient.get("http://backendpapp.test:8800/api/drugs/"+id+"/elementPrescriptions");
  }

  getMoreProduct(url){

    return this.httpClient.get(url);
  }

  getOneProduct(id){
    return this.httpClient.get("http://backendpapp.test:8800/api/drugs/"+id);
  }

  insertProduct(data){

    return this.httpClient.post("http://backendpapp.test:8800/api/drugs",data).pipe(catchError(this.handleError));

  }
  handleError(error){
    return throwError(error || "Server Error");
  }

  updateProduct(id,data){
    return this.httpClient.post("http://backendpapp.test:8800/api/drugs/"+id,data).pipe(catchError(this.handleError));
  }

  deleteProduct(id){
    return this.httpClient.delete("http://backendpapp.test:8800/api/drugs/"+id);
  }

  searchProduct(data){
    return this.httpClient.get("http://backendpapp.test:8800/api/drugs/search?field="+data.field+"&searchQuery="+data.searchQuery);
  }




}
