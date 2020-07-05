<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DrugForm extends Model
{
    protected $fillable = ['drugForm'];

    public function elementPrescriptions() {

        return $this->hasMany("App\Models\ElementPrescription");
    }
}
