<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pharmacie extends Model
{
    protected $fillable=["address_id","pharmacyName","email","phone","fax"];
}
