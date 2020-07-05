<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;

use App\Services\AddressService;

class AddressController extends Controller
{
    private $addressService;

    public function __construct(AddressService $address)
    {
        $this->addressService=$address;
    }

    public function create(Request $request){

        $validate=$this->addressService->validateCreateAddress($request);

        if($validate){
            return response($validate->errors(),400);
        }

        $data=$request->all();
        $addr=$this->addressService->create($data);

        return response($addr,201);
    }

    public function update($id,Request $request){
        $address=$this->addressService->find($id);
        $validate=$this->addressService->validateUpdate($request);
        if($validate){
            return response($validate->errors(),400);
        }

        $data=$request->all();
        $address=$this->addressService->update($id,$data);

        return response( $address,200);
    }

    public function delete($id){
        try {
            $this->addressService->delete($id);
            return response(null,204);
        } catch(Exception $e) {
            $errRespnse = ["error" => $e->getMessage()];
            return response($errRespnse,404);
        }
    }
}
