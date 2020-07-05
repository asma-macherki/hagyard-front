<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{

    protected $fillable=["country","city","postalCode","state"];

    public function pharmacist() {

        return $this->belongsTo('App\Models\Pharmacist');
    }

}


