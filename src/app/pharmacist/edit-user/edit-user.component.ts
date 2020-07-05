import { Component, OnInit } from '@angular/core';
import{Router} from'@angular/router';
import { NotifierService } from "angular-notifier";
import {FormBuilder,FormGroup,Validators} from'@angular/forms';
import { ActivatedRoute } from '@angular/router';
import {pharmacistService} from '../../Services/pharmacist.service';
import { Pharmacist } from '../Models/Pharmacist';

@Component({
  selector: 'app-edit-user',
  templateUrl: './edit-user.component.html',
  styleUrls: ['./edit-user.component.css']
})
export class EditUserComponent implements OnInit {
  id:any;
  data:any;
  pharmacist=new Pharmacist();
  constructor(private router:Router,private route:ActivatedRoute,private pharmacyService:pharmacistService) { }

  ngOnInit(): void {
    this.id=this.route.snapshot.params.id;
    this.findOne();
  }

  findOne(){
    this.pharmacyService.findOneUser(this.id).subscribe(res=>{
      console.log(res);
      this.data=res;
      this.pharmacist=this.data;
    })
  }


}
