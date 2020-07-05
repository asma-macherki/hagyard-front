<?php

namespace App\Repositories;

use App\Models\ElementPrescription ;

class ElementPrescriptionRepository{

    private $elementPrescriptionModel;

    public function __construct(ElementPrescription $elementPrescriptionModel)
    {
        $this->elementPrescriptionModel=$elementPrescriptionModel;
    }

    public function all(){

        return ElementPrescription::all();
    }

    public function find($id){

        return ElementPrescription::findOrFail($id);
    }

     public function create($data){

         $element=new ElementPrescription($data);
         $element->save();

         return $element;
    }

    public function update($id,$data){

        $element=ElementPrescription::findOrFail($id);
        $element->update($data);

        return $element;
    }

    public function delete($id){

        $element=ElementPrescription::findOrFail($id);
        $element->delete();
    }



}
