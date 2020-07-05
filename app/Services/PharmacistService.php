<?php

namespace App\Services;

use App\Repositories\PharmacistRepository;
use App\Services\UserService;
use App\Services\AddressService;
use App\Services\PharmacyService;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PharmacistService{

    private $pharmacistRepository;
    private $userService;
    private $adressService;
    private $pharmacyService;


    public function __construct(PharmacistRepository $pharmacist,UserService $user,AddressService $adr)
    {
        $this->pharmacistRepository=$pharmacist;
        $this->userService=$user;
        $this->adressService=$adr;
    }

    public function all(){

        return $this->pharmacistRepository->all();
    }

    public function find($id){

        return $this->pharmacistRepository->find($id);
    }


    public function validateCreatePharmacist(Request $request){


        $validatorUser = $this->userService->validateCreateUser($request);
        $validatorAdress = $this->adressService->validateCreateAddress($request);
        $validatorPharmacist = Validator::make($request->all(), [
            'admin' => 'bail|required'
        ]);

        if(($validatorUser && $validatorUser->fails()) || ($validatorAdress &&$validatorAdress->fails())|| ( $validatorPharmacist && $validatorPharmacist->fails())) {

            if($validatorUser && $validatorAdress && $validatorPharmacist)
                $errors = $validatorUser->errors()->merge($validatorAdress->errors())->merge($validatorPharmacist->errors);

            elseif($validatorUser)
                $errors = $validatorUser->errors();
            elseif($validatorAdress)
                $errors = $validatorAdress->errors();
            else
                $errors = $validatorPharmacist->errors();

            return $errors;
        }
        else {

            return null;
        }


    }

    public function create($data){

        return $this->pharmacistRepository->create($data);
    }


    public function validateUpdate(Request $request,$id){

        $validatorUser=$this->userService->validateUpdate($request,$id);
        $validatorAdress=$this->adressService->validateUpdate($request);
        $validatorPharmacist = Validator::make($request->all(), [
            'admin' => 'bail|required'
        ]);

        if(($validatorUser && $validatorUser->fails()) || ($validatorAdress &&$validatorAdress->fails())|| ( $validatorPharmacist && $validatorPharmacist->fails())) {

            if($validatorUser && $validatorAdress && $validatorPharmacist)
                $errors = $validatorUser->errors()->merge($validatorAdress->errors())->merge($validatorPharmacist->errors);

            elseif($validatorUser)
                $errors = $validatorUser->errors();
            elseif($validatorAdress)
                $errors = $validatorAdress->errors();
            else
            $errors = $validatorPharmacist->errors();

            return $errors;
        }
        else {

            return null;
        }



    }

    public function update($id,$data){
        return $this->pharmacistRepository->update($id,$data);
    }

    public function delete($id){

        return $this->pharmacistRepository->delete($id);
    }

    public function allByFirstName($query) {
        return $this->pharmacistRepository->allByFirstName($query);
    }

    public function allByLastName($query) {
        return $this->pharmacistRepository->allByLastName($query);
    }

    public function allByEmail($query) {
        return $this->pharmacistRepository->allByEmail($query);
    }

}
