<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DrugStrength extends Model
{
    protected $fillable = ['drugStrength'];

    public function elementPrescriptions() {

       return  $this->hasMany("App\Models\ElementPrescription");
    }
}
