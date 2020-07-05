<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DrugType extends Model
{
    protected $fillable = ['drugType','handling','margin'];

    public function elementPrescriptions() {

        return $this->hasMany("App\Models\ElementPrescription");
    }
}
