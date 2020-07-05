<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ElementPrescriptionRessource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [

            "gpCode"=>$this->id,
            "drug_id"=>$this->drug_id,
            "drugTypeName"=>$this->drugType->drugType,
            "drugFromName"=>$this->drugForm->drugForm,
            "drugStrengthName"=>$this->drugStrength->drugStrength,
            "size"=>$this->size,
            "price"=>$this->price

        ];

        return parent::toArray($request);
    }
}
