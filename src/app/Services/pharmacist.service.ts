import { Injectable } from '@angular/core';
import { HttpClient}from '@angular/common/http';
import {catchError} from 'rxjs/operators';
import {observable,throwError} from 'rxjs'

@Injectable({
  providedIn: 'root'
})
export class pharmacistService {

  constructor(private httpClient:HttpClient) { }

  getUsers(){
    return this.httpClient.get("http://backendpapp.test:8800/api/Pharmacist");
  }
  getMoreUser(url){

    return this.httpClient.get(url);
  }

  insertUser(data){
    return this.httpClient.post("http://backendpapp.test:8800/api/Pharmacist",data).pipe(catchError(this.handleError));
  }

  handleError(error){
    return throwError(error || "Server Error");
  }

  findOneUser(id){
    return this.httpClient.get("http://backendpapp.test:8800/api/Pharmacist/"+id);
  }

  updateUser(id,data){
    return this.httpClient.post("http://backendpapp.test:8800/api/Pharmacist/"+id,data).pipe(catchError(this.handleError));
  }

  searchProduct(data){
    return this.httpClient.get("http://backendpapp.test:8800/api/drugs/search?field="+data.field+"&searchQuery="+data.searchQuery);
  }

}
