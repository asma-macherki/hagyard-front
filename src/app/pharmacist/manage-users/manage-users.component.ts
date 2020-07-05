import { Component, OnInit } from '@angular/core';
import Swal from'sweetalert2';
import {pharmacistService} from '../../Services/pharmacist.service'

@Component({
  selector: 'app-manage-users',
  templateUrl: './manage-users.component.html',
  styleUrls: ['./manage-users.component.css']
})
export class ManageUsersComponent implements OnInit {

  users=null;
  visible=false;
  link=null;
  backurl =null ;
  currentPage=1;
  numberPage=[];
  disp=true;
  newPlacehold="search by"

  form={
    'field':null ,
    'searchQuery':null
  }

  constructor(private pharmacistService:pharmacistService) { }

  ngOnInit(): void {
    this.getUsers();
  }

  getUsers(){

    this.pharmacistService.getUsers().subscribe(res=>{
      console.log(res);
      this.users=res;
      this.link=this.users.links.next;
      console.log(this.link);
      this.backurl=this.users.links.prev;

      this.currentPage=this.users.meta.current_page;
      console.log(this.users.links.last);
      this.numberPage.length=this.users.meta.last_page;

      this.users=this.users.data;


    })
  }

  showModal(){
    Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to active this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, active it!'
    }).then((result) => {
      if (result.value) {
        Swal.fire(
          'Active!',
          'Your pharmacits has been activated.',
          'success'
        )
      }
    })
  }

  nextPage(){

    this.visible=true;
    this.users=null;
    console.log(this.link);
    this.pharmacistService.getMoreUser(this.link).subscribe(res=>{
     this.users=res;
     this.link=this.users.links.next;
     this.backurl=this.users.links.prev;
     this.currentPage=this.users.meta.current_page;

     this.users=this.users.data;

      if(this.link===null){
      this.disp=false;
    }
  });
  }

  backPage(){

    this.users=null;


    this.pharmacistService.getMoreUser(this.backurl).subscribe(res=>{

     this.users=res;

     this.link=this.users.links.next;
     console.log(this.link)
     this.backurl=this.users.links.prev;

     this.currentPage=this.users.meta.current_page;

     this.users=this.users.data;
     if(this.backurl===null){

      this.visible=false ;
        this.disp=true ;
    }
  });
  }

  find(){

    console.log(this.form)
    this.pharmacistService.searchProduct(this.form).subscribe(res=>{
    this.users=res;
    this.link=this.users.next_page_url;
    this.backurl=this.users.prev_page_url;
    this.currentPage=this.users.current_page;
    this.numberPage.length=this.users.last_page;

    this.users=this.users.data;

    });
  }

  change(num) {

    if(num==='1'){

        this.newPlacehold="Search by first Name"
        this.form.field='firstName';

    }else if(num==='2'){

        this.newPlacehold='search by last Name';
        this.form.field='lastName';

    }else if(num==='3'){

      this.newPlacehold='search by email';
      this.form.field='email';
    }else

      this.newPlacehold='Search by'
}

}
