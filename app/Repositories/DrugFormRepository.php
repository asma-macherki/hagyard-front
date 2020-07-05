<?php

namespace App\Repositories;

use App\Models\DrugForm ;

class DrugFormRepository{

    private $drugFormModel;

    public function __construct(DrugForm $drugFormModel)
    {
        $this->drugFormModel=$drugFormModel;
    }

    public function all(){

        return DrugForm::all();
    }

    public function find($id){

        return DrugForm::findOrFail($id);
    }

    public function create($data){
        $drugForm=new DrugForm($data);
        $drugForm->save();

        return $drugForm;
    }
    public function update($id,$data){
        $drugForm=DrugForm::findOrFail($id);
        $drugForm->update($data);
        return $drugForm;
    }

    public function delete($id){
        $drugForm=DrugForm::findOrFail($id);
        $drugForm->delete();
    }

}
