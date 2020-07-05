<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ElementPrescription extends Model
{

    protected $fillable=["drug_id","drug_type_id","drug_form_id","drug_strength_id","size","price"];

    public function drug(){
      return  $this->belongsTo("App\Models\Drug");
    }

    public function drugType(){
       return $this->belongsTo("App\Models\DrugType");
    }

    public function drugForm(){
       return  $this->belongsTo("App\Models\DrugForm");
    }

    public function DrugStrength(){
       return $this->belongsTo("App\Models\DrugStrength");
    }

}
