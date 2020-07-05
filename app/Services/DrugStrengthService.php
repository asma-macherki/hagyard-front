<?php

namespace App\Services;


use App\Repositories\DrugStrengthRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DrugStrengthService{

    private $strengthRepository;

    public function __construct(DrugStrengthRepository $drugstrengthRepository){


        $this->strengthRepository=$drugstrengthRepository;
    }

   public function all(){

        return $this->strengthRepository->all();
   }

    public function find($id){

        //return $this->strengthRepository->find($id);
        return $this->strengthRepository->find($id);
    }

    public function validateCreate(Request $request){

        $validator = Validator::make($request->all(), [
            'drugStrength' => 'bail|required',

        ]);

        if($validator->fails())
            return $validator;
        else
            return null;
    }
    public function create($data){
        return $this->strengthRepository->create($data);
    }

    public function validateUpdate(Request $request){
        $validator = Validator::make($request->all(), [
            'drugStrength' => 'bail|required',

        ]);

        if($validator->fails())
            return $validator;
        else
            return null;
    }

    public function update($id,$data){
        return $this->strengthRepository->update($id,$data);
    }

    public function delete($id){
        return $this->strengthRepository->delete($id);
    }
}
