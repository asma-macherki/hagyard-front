import { Injectable } from '@angular/core';
import { HttpClient}from '@angular/common/http';
import {catchError} from 'rxjs/operators';
import {observable,throwError} from 'rxjs'

@Injectable({
  providedIn: 'root'
})
export class ElementPrescriptionService {

  constructor(private httpClient:HttpClient) { }

  insertElementPrescription(data){
    return this.httpClient.post("http://backendpapp.test:8800/api/ElementPrescriptions",data).pipe(catchError(this.handleError));
  }

  updateElementPrescription(id,data){

    return this.httpClient.put("http://backendpapp.test:8800/api/ElementPrescriptions/"+id,data).pipe(catchError(this.handleError));
  }

  findOneElement(id){
    return this.httpClient.get("http://backendpapp.test:8800/api/ElementPrescriptions/"+id);
  }

  deleteElementPrescription(id){
    return this.httpClient.delete("http://backendpapp.test:8800/api/ElementPrescriptions/"+id);
  }

  handleError(error){
    return throwError(error || "Server Error");
  }

}
