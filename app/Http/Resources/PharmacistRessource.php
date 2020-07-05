<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PharmacistRessource extends JsonResource
{

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "id" => $this->user_id,
            "admin"=>$this->admin,
           "email" => $this->user->email,
           "password"=>$this->user->password,
            "firstName"=>$this->user->firstName,
            "lastName"=>$this->user->lastName,
            "actif"=>$this->user->actif,
            "dateOfBirth"=>$this->user->dateOfBirth,
            "phone"=>$this->user->phone,
            "gender"=>$this->user->gender,
            "country"=>$this->user->address->country,
            "city"=>$this->user->address->city,
            "state"=>$this->user->address->state,
            "postalCode"=>$this->user->address->postalCode,
            "pharmacyName"=>$this->pharmacy->pharmacyName
        ];

        return parent::toArray($request);
    }
}
