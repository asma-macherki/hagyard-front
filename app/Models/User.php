<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{

    protected $fillable=["actif","address_id","email","firstName","lastName",
    "dateOfBirth","phone","gender","password"];

    public function pharmacist() {
        return $this->hasOne('App\Models\Pharmacist');
    }

    public function address() {
        return $this->belongsTo('App\Models\Address');
    }

}



