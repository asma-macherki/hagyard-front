<?php

namespace App\Repositories;

use App\Models\Address;

class AddressRepository{

    private $addressModel;

    public function __construct(Address $address){

        $this->addressModel=$address;
    }

    public function all(){
        return Address::all();
    }
    public function find($id){

        return Address::findOrFail($id);
    }

    public function create($data){

        $address=new Address($data);
        $address->save();

        return $address;
    }

    public function update($id,$data){
        $address=Address::findOrFail($id);
        $address->update($data);
        return  $address;
    }

    public function delete($id){
        $address=Address::findOrFail($id);
        $address->delete();
    }
}
