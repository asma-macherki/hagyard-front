<?php

namespace App\Services;

use App\Repositories\AddressRepository;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Validator;


class AddressService{

    private $addressRepository;


    public function __construct(AddressRepository $address)
    {
        $this->addressRepository=$address;
    }

    public function all(){
        return $this->addressRepository->all();
    }

    public function find($id){
        return $this->addressRepository->find($id);
    }

    public function validateCreateAddress(Request $request){

        $validator = Validator::make($request->all(), [

            'country' => 'bail|required',
            'city' => 'bail|required',
            'state' => 'bail|required',
            'postalCode' => 'bail|required'
        ]);

        if($validator->fails())
            return $validator;
         else
            return null;
    }

    public function create($data){

        return $this->addressRepository->create($data);
    }

    public function validateUpdate(Request $request){

        $validator = Validator::make($request->all(), [

            'country' => 'bail|required',
            'city' => 'bail|required',
            'state' => 'bail|required',
            'postalCode' => 'bail|required'
        ]);

        if($validator->fails())
            return $validator;
         else
            return null;

    }
    public function update($id,$data){
        return $this->addressRepository->update($id,$data);
    }

    public function delete($id){
        return $this->addressRepository->delete($id);
    }
}
