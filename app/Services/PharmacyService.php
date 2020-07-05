<?php

namespace App\Services;

use App\Repositories\PharmacyRepository;

class PharmacyService{

    private $pharmacyRepository;

   public function __construct(PharmacyRepository $pharmacy)
   {
       $this->pharmacyRepository=$pharmacy;
   }

   public function find($id){

       return $this->pharmacyRepository->find($id);
   }
}
