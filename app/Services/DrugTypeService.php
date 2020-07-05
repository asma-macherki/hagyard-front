<?php

namespace App\Services;
use App\Repositories\DrugTypeRepository ;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DrugTypeService{

    private $drugTypeRepository;

    public function __construct(DrugTypeRepository $drugTypeRepository)
    {
        $this->drugTypeRepository=$drugTypeRepository;
    }

    public function all(){

        return $this->drugTypeRepository->all();
    }

    public function find($id){

        return $this->drugTypeRepository->find($id);
    }

    public function validateCreate(Request $request){

        $validator = Validator::make($request->all(), [
            'drugType' => 'bail|required',
            'handling' => 'bail|required',
            'margin' => 'bail|required'

        ]);

        if($validator->fails())
            return $validator;
        else
            return null;
    }
    public function create($data){
        return $this->drugTypeRepository->create($data);
    }

    public function validateUpdate(Request $request){
        $validator = Validator::make($request->all(), [
            'drugType' => 'bail|required',
            'handling' => 'bail|required',
            'margin' => 'bail|required'

        ]);

        if($validator->fails())
            return $validator;
        else
            return null;
    }

    public function update($id,$data){
        return $this->drugTypeRepository->update($id,$data);
    }

    public function delete($id){
        return $this->drugTypeRepository->delete($id);
    }

}
