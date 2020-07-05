<?php

namespace App\Http\Controllers;
use Exception;

use Illuminate\Http\Request;
use App\Services\UserService;

class UserController extends Controller
{
    private $userService;

    public function __construct(UserService $user)
    {
        $this->userService=$user;
    }

    public function all(){
        return $this->userService->all();
    }

    public function find($id){
        try {
            return $this->userService->find($id);

           } catch(Exception $e) {

               $errRespnse = ["error" =>$e->getMessage()];
               return response($errRespnse,404);
           }
    }

    public function create(Request $request){

        $validate=$this->userService->validateCreateUser($request);

        if($validate){
            return response($validate->errors(),400);
        }

        $data=$request->all();
        $usr=$this->userService->create($data);

        return response($usr,201);
    }

    public function update($id,Request $request){
        $user =$this->userService->find($id);
        $validate=$this->userService->validateUpdate($request);
        if($validate){
            return response($validate->errors(),400);
        }

        $data=$request->all();
        $user=$this->userService->update($id,$data);

        return response( $user,200);

    }

    public function delete($id){
        try {
            $this->userService->delete($id);
            return response(null,204);
        } catch(Exception $e) {
            $errRespnse = ["error" => $e->getMessage()];
            return response($errRespnse,404);
        }
    }


}
