<?php

namespace App\Services;
use App\Repositories\DrugRepository as DrugRepository;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DrugService {

    private $drugRepository;

    public function __construct(DrugRepository $drugRepository){

        $this->drugRepository=$drugRepository;
    }

    public function all(){

        return $this->drugRepository->all();
    }

    public function allWithElementPrescriptions() {
        return $this->drugRepository->allWithElementPrescriptions();
    }

    public function find($id){

        return $this->drugRepository->find($id);
    }


    public function allByProductName($query) {
        return $this->drugRepository->allByProductName($query);
    }

    public function allByTradeName($query) {
        return $this->drugRepository->allByTradeName($query);
    }



    public function validateCreateDrug(Request $request) {

        $validator = Validator::make($request->all(), [
            'drugName' => 'bail|required|unique:drugs',
            'drugTradeName' => 'bail|required|unique:drugs',
        ]);

        if($validator->fails())
            return $validator;
        else
            return null;
    }


    public function create($data){

        return $this->drugRepository->create($data);
    }



    public function validateUpdateDrug(Request $request,$id) {


        $validator = Validator::make($request->all(), [
            'drugName' => 'bail|required|unique:drugs,drugName,'.$id,
            'drugTradeName' => 'bail|required|unique:drugs,drugTradeName,'.$id,

        ]);

        if($validator->fails())
            return $validator;
        else
            return null;
    }


    public function update($id,$data){

        return $this->drugRepository->update($id,$data);
    }


    public function delete($id){

        $this->drugRepository->delete($id);
    }


}
