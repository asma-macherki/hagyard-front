<?php

namespace App\Services;

use App\Repositories\UserRepository;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Validator;

class UserService{

    private $userRepository;


    public function __construct(UserRepository $user)
    {
        $this->userRepository=$user;
    }

    public function all(){
        return $this->userRepository->all();
    }

    public function find($id){
        return $this->userRepository->find($id);
    }


    public function validateCreateUser(Request $request){

        $validator = Validator::make($request->all(), [

            'email' => 'bail|required|unique:users',
            'firstName' => 'bail|required',
            'lastName' => 'bail|required',
            'dateOfBirth'=> 'bail|required',
            'phone'=> 'bail|required',
            'gender'=> 'bail|required',
            'actif'=>'bail|required'
        ]);

        if($validator->fails())
        return $validator;
        else
        return null;
    }

    public function create($data){
        return $this->userRepository->create($data);
    }

    public function validateUpdate(Request $request,$id){
        $validator = Validator::make($request->all(), [

            'email' => 'bail|required|unique:users,email,',$id,
            'firstName' => 'bail|required',
            'lastName' => 'bail|required',
            'dateOfBirth'=> 'bail|required',
            'phone'=> 'bail|required',
            'gender'=> 'bail|required',
            'actif'=>'bail|required'
        ]);

        if($validator->fails())
        return $validator;
        else
        return null;
    }

    public function update($id,$data){
        return $this->userRepository->update($id,$data);
    }

    public function delete($id){
        return $this->userRepository->delete($id);
    }
}
