<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\DrugTypeService;

use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class DrugTypeController extends Controller
{

    private $drugTypeService;

    public function __construct(DrugTypeService $drugTypeService)
    {
        $this->drugTypeService=$drugTypeService;
    }

    public function all(){
        return $this->drugTypeService->all();
    }

    public function find($id){
        try{
            return $this->drugTypeService->find($id);
        }catch(Exception $e) {

            $errRespnse = ["error" =>$e->getMessage()];
            return response($errRespnse,404);
        }
    }


    public function create(Request $request){
        $validate=$this->drugTypeService->validateCreate($request);

        if($validate){
            return response($validate->errors(),400);
        }

        $data=$request->all();
        $drug=$this->drugTypeService->create($data);

        return response($drug,201);
    }

    public function update($id,Request $request){
        $drug = $this->drugTypeService->find($id);

        $validate=$this->drugTypeService->validateUpdate($request,$drug->id);

        if($validate){
            return response($validate->errors(),400);
        }

        $data=$request->all();
        $drug=$this->drugTypeService->update($id,$data);

        return response($drug,200);
    }


    public function delete($id){
        try {
            $this->drugTypeService->delete($id);
            return response(null,204);
        } catch(Exception $e) {
            $errRespnse = ["error" => $e->getMessage()];
            return response($errRespnse,404);
        }
    }
}
