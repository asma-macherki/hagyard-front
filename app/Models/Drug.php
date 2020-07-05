<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Drug extends Model
{
    protected $fillable = ['drugName','drugTradeName'];

    public function elementPrescriptions() {

        return $this->hasMany("App\Models\ElementPrescription");
    }
}
