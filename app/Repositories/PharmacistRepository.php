<?php

namespace App\Repositories;

use App\Models\Address;
use App\Models\Pharmacist;
use App\Models\User;
use Illuminate\Support\Facades\DB;


class PharmacistRepository{

    private $pharmacistModel;


    public function __construct(Pharmacist $pharmacist){

        $this->pharmacistModel=$pharmacist;
    }

    public function all(){

        $pharmacists = $this->pharmacistModel->paginate(5);
        return $pharmacists;
    }

    public function find($id){

        return Pharmacist::findOrFail($id);
    }

    public function create($data){

        $pharmacist=new Pharmacist($data);
        $pharmacist->save();

        return $pharmacist;

    }


    public function update($id,$data){

        $pharmacist=Pharmacist::findOrFail($id);
        $pharmacist->update($data);

        return $pharmacist;
    }













    public function delete($id){
        $phar=Pharmacist::findOrFail($id);
        $phar->delete();
    }

    public function allByFirstName($query) {

        $pharmacists = Pharmacist::whereHas('user', function($sqlQuery) use ($query) {
                            $sqlQuery->where('firstName','LIKE',"%{$query}%");
                        });


        return $pharmacists->paginate(5);
    }

    public function allByLastName($query) {
        return Pharmacist::where('lastName','LIKE',"%{$query}%")->paginate(5);
    }

    public function allByEmail($query) {
        return Pharmacist::where('email','LIKE',"%{$query}%")->paginate(5);
    }


}
