<?php

namespace App\Services;
use App\Repositories\DrugFormRepository;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DrugFormService{

    private $drugFormRepository;

    public function __construct(DrugFormRepository $drugFormRepository)
    {
        $this->drugFormRepository=$drugFormRepository;
    }

    public function all(){
        return $this->drugFormRepository->all();
    }

    public function find($id){

        return $this->drugFormRepository->find($id);
    }

    public function validateCreate(Request $request){

        $validator = Validator::make($request->all(), [
            'drugForm' => 'bail|required|',

        ]);

        if($validator->fails())
            return $validator;
        else
            return null;
    }
    public function create($data){
        return $this->drugFormRepository->create($data);
    }

    public function validateUpdate(Request $request){
        $validator = Validator::make($request->all(), [
            'drugForm' => 'bail|required',

        ]);

        if($validator->fails())
            return $validator;
        else
            return null;
    }

    public function update($id,$data){
        return $this->drugFormRepository->update($id,$data);
    }

    public function delete($id){
        return $this->drugFormRepository->delete($id);
    }
}
