<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pharmacist extends Model
{

    protected $primaryKey = 'user_id';

    protected $fillable=["admin","pharmacy_id","user_id"];

    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    public function pharmacy(){
        return $this->belongsTo('App\Models\Pharmacie');
    }
}


