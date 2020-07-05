<?php

namespace App\Repositories;

use App\Models\Drug ;
use Illuminate\Support\Facades\DB;


class   DrugRepository {

    private $drugModel;

    public function __construct(Drug $drugModel) {
        $this->drugModel=$drugModel;
    }

    public function all(){

        //return Drug::all();
        $users = DB::table('drugs')->paginate(3);
        return $users;
    }

    public function allWithElementPrescriptions() {

        return Drug::with('elementPrescriptions')->get();
    }

    public function find($id){

        return Drug::findOrFail($id);

    }

    public function create($data){

        $drug=new Drug($data);
        $drug->save();

        return $drug;
   }

   public function update($id,$data){

        $drug=Drug::findOrFail($id);
        $drug->update($data);
        return $drug;
   }


   public function allByProductName($query) {
       return Drug::where('drugTradeName','LIKE',"%{$query}%")->paginate(3);
   }

   public function allByTradeName($query) {

    return Drug::where('drugTradeName','LIKE',"%{$query}%")->paginate(3);
    }



   public function delete($id){

        $drug=Drug::findOrFail($id);
        $drug->delete();
   }





}
