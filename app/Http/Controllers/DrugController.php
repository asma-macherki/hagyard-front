<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;



use App\Services\DrugService;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\Resources\ElementPrescriptionRessource;

use App\Models\Drug;

class DrugController extends Controller
{

    private $drugService;

    public function __construct(DrugService $drugService)
    {
       $this->drugService=$drugService;
    }

   public function all(){

        //$drugs = Drug::find(1);
        /*$drugs = Drug::with('elementPrescriptions')->get();
        return $drugs;*/

        $drugs = $this->drugService->all();

        return $drugs;
   }

   public function find($id){

       try {
        return $this->drugService->find($id);

       } catch(Exception $e) {

           $errRespnse = ["error" =>$e->getMessage()];
           return response($errRespnse,404);
       }

   }


   public function search(Request $request){


        switch($request->field) {
            case "ProductName" :
                return $this->drugService->allByProductName($request->searchQuery);
            break;
            case "TradeName" :
                $this->drugService->allByTradeName($request->query);
            break;
        }
   }

   public function create(Request $request){

        $validate=$this->drugService->validateCreateDrug($request);

        if($validate){
            return response($validate->errors(),400);
        }

        $data=$request->all();
        $drug=$this->drugService->create($data);

        return response($drug,201);

   }

    public function update($id,Request $request){


        $drug = $this->drugService->find($id);


        $validate=$this->drugService->validateUpdateDrug($request,$drug->id);

        if($validate){
            return response($validate->errors(),400);
        }

        $data=$request->all();
        $drug=$this->drugService->update($id,$data);

        return response($drug,200);

    }

    public function delete($id){
        try {
            $this->drugService->delete($id);
            return response(null,204);
        } catch(Exception $e) {
            $errRespnse = ["error" => $e->getMessage()];
            return response($errRespnse,404);
        }
    }


    public function getElementPrescriptions($id) {
        try {

            $drug = $this->drugService->find($id);

            return ElementPrescriptionRessource::collection($drug->elementPrescriptions);

           } catch(Exception $e) {

               $errRespnse = ["error" =>$e->getMessage()];
               return response($errRespnse,404);
           }
    }

}
