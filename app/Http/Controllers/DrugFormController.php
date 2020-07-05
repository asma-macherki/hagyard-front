<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\DrugFormService ;


use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class DrugFormController extends Controller
{
    private $drugFormService;

    public function __construct(DrugFormService $drugFormService)
    {
        $this->drugFormService=$drugFormService;
    }

    public function all(){
        return $this->drugFormService->all();
    }

    public function find($id){
        try{
            return $this->drugFormService->find($id);
        }catch(Exception $e) {

            $errRespnse = ["error" =>$e->getMessage()];
            return response($errRespnse,404);
        }
    }

    public function create(Request $request){
        $validate=$this->drugFormService->validateCreate($request);

        if($validate){
            return response($validate->errors(),400);
        }

        $data=$request->all();
        $drug=$this->drugFormService->create($data);

        return response($drug,201);
    }

    public function update($id,Request $request){
        $drug = $this->drugFormService->find($id);

        $validate=$this->drugFormService->validateUpdate($request,$drug->id);

        if($validate){
            return response($validate->errors(),400);
        }

        $data=$request->all();
        $drug=$this->drugFormService->update($id,$data);

        return response($drug,200);
    }

    public function delete($id){
        try {
            $this->drugFormService->delete($id);
            return response(null,204);
        } catch(Exception $e) {
            $errRespnse = ["error" => $e->getMessage()];
            return response($errRespnse,404);
        }
    }
}

