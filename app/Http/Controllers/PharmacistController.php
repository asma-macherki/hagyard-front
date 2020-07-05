<?php

namespace App\Http\Controllers;

use App\Http\Resources\PharmacistRessource;
use Illuminate\Http\Request;
use App\Models\Pharmacist;
use App\Models\Pharmacie;


use App\Services\PharmacistService;
use App\Services\UserService;
use App\Services\AddressService;
use App\Services\PharmacyService;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use Exception;


class PharmacistController extends Controller{

    private $pharmacistService;
    private $userService;
    private $pharmacyService;

    public function __construct(AddressService $addressService,PharmacistService $pharmacist,UserService $user,PharmacyService $pharmacy)
    {
        $this->pharmacistService=$pharmacist;
        $this->userService=$user;
        $this->pharmacyService=$pharmacy;
        $this->addressService = $addressService;
    }

    public function all() {

        return PharmacistRessource::collection($this->pharmacistService->all());

    }




    public function find($id){
        try {

            return new PharmacistRessource($this->pharmacistService->find($id));
            //return $this->pharmacistService->find($id);

           } catch(Exception $e) {

               $errRespnse = ["error" =>$e->getMessage()];
               return response($errRespnse,404);
           }
    }




    public function create(Request $request){

        try{

            $pharmacy=$this->pharmacyService->find($request->pharmacy_id);
            $validateErrors=$this->pharmacistService->validateCreatePharmacist($request);
            if($validateErrors){

                return response($validateErrors,400);
            }

            $data=$request->all();

            $addressData = [
                "country"=>$data["country"],
                "city"=>$data["city"],
                "state"=>$data["state"],
                "postalCode"=>$data["postalCode"]

            ];

            $adress = $this->addressService->create($addressData);
            $adress->save();


            $hashed_random_password = Hash::make(str::random(8));


            $userData = [
                    "address_id" => $adress->id,
                    "email" => $data["email"],
                    "password" => $hashed_random_password,
                    "firstName" => $data["firstName"],
                    "lastName" => $data["lastName"],
                    "actif" => $data["actif"],
                    "dateOfBirth" => $data["dateOfBirth"],
                    "phone" => $data["phone"],
                    "gender" => $data["gender"],
            ];

            $user = $this->userService->create($userData);



            $pharmacistData = [
                "admin"=>$data["admin"],
                "pharmacy_id"=>$data["pharmacy_id"],
                "user_id" => $user->id
            ];

            $phar=$this->pharmacistService->create($pharmacistData);
            return response( new PharmacistRessource($phar),201);
        }catch(Exception $e){
            $errRespnse = ["error" => $e->getMessage()];
            return response($errRespnse,404);
        }
    }

    public function update($id,Request $request){

        $pharmacist = $this->pharmacistService->find($id);;

        $validateErrors=$this->pharmacistService->validateUpdate($request,$id);
        if($validateErrors){

            return response($validateErrors,400);
        }

        $data=$request->all();

        $addressData = [
            "country"=>$data["country"],
            "city"=>$data["city"],
            "state"=>$data["state"],
            "postalCode"=>$data["postalCode"]

        ];

        $adress=$this->addressService->update($pharmacist->user->address_id, $addressData);

        $userData = [

            "address_id" => $adress->id,
            "email" => $data["email"],
            "firstName" => $data["firstName"],
            "lastName" => $data["lastName"],
            "actif" => $data["actif"],
            "dateOfBirth" => $data["dateOfBirth"],
            "phone" => $data["phone"],
            "gender" => $data["gender"],
        ];

        $user =$this->userService->update($pharmacist->user_id, $userData);

        $pharmacistData = [
            "admin"=>$data["admin"],
            //"pharmacy_id"=>$data["pharmacy_id"],
            "user_id" => $user->id
        ];

        $phar=$this->pharmacistService->update($id,$pharmacistData);

        return response(  new PharmacistRessource($phar),200);
    }

    public function delete($id){

        try{
            $pharmacist = $this->pharmacistService->find($id);
            $adr=$this->addressService->delete( $pharmacist->user->address_id);
            $user=$this->userService->delete( $pharmacist->user_id);
            $this->pharmacistService->delete($id);
            return response(null,204);
        }catch(Exception $e) {
            $errRespnse = ["error" => $e->getMessage()];
            return response($errRespnse,404);
        }
    }


   public function search(Request $request){

    switch($request->field) {
        case "firstName" :
            return $this->pharmacistService->allByFirstName($request->searchQuery);
        break;
        case "lastName" :
            $this->pharmacistService->allByLastName($request->query);
        break;
        case "email" :
            $this->pharmacistService->allByEmail($request->query);
        break;
    }
}
}


