<?php

namespace App\Repositories;

use App\Models\DrugType ;

class DrugTypeRepository{

    private $drugTypeModel;

    public function __construct(DrugType $drugTypeModel)
    {
        $this->drugTypeModell=$drugTypeModel;
    }

    public function all(){

        return DrugType::all();
    }

    public function find($id){
        return DrugType::findOrFail($id);
    }

    public function create($data){

        $drugType=new DrugType($data);
        $drugType->save();

        return $drugType;
    }

    public function update($id,$data){
        $drugType=DrugType::findOrFail($id);
        $drugType->update($data);
        return $drugType;
    }

    public function delete($id){
        $drugType=DrugType::findOrFail($id);
        $drugType->delete();
    }

}
