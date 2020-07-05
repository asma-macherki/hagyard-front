<?php

 namespace App\Repositories;

 use App\Models\Pharmacie;

 class PharmacyRepository{

    private $pharmacyModel;

    public function __construct(Pharmacie $pharmacy)
    {
        $this->pharmacyModel=$pharmacy;
    }

    public function find($id){

        return Pharmacie::findOrFail($id);
    }
 }

