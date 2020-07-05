<?php


namespace App\Repositories;

use App\Models\DrugStrength ;

class DrugStrengthRepository{

    private $drugStrengthModel;

    public function __construct(DrugStrength $drugStrengthModel)
    {
        $this->drugStrengthModel=$drugStrengthModel;
    }

    public function all(){

        return DrugStrength::all();
    }

    public function find($id){

        return DrugStrength::findOrFail($id);
    }

    public function create($data){
        $drugStrength=new DrugStrength($data);
        $drugStrength->save();

        return $drugStrength;
    }

    public function update($id,$data){
        $drugStrength=DrugStrength::findOrFail($id);
        $drugStrength->update($data);
        return $drugStrength;
    }

    public function delete($id){
        $drugStrength=DrugStrength::findOrFail($id);
        $drugStrength->delete();
    }
}
