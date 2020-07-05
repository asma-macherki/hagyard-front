<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\DrugStrengthService ;

use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class DrugStrengthController extends Controller
{
    private $drugStrengthService;

    public function __construct(DrugStrengthService $drugStrengthService)
    {
        $this->drugStrengthService=$drugStrengthService;
    }

    public function all(){
        return $this->drugStrengthService->all();
    }

    public function find($id){
        try{
            return $this->drugStrengthService->find($id);
        }catch(Exception $e) {

            $errRespnse = ["error" =>$e->getMessage()];
            return response($errRespnse,404);
        }
    }

    public function create(Request $request){
        $validate=$this->drugStrengthService->validateCreate($request);

        if($validate){
            return response($validate->errors(),400);
        }

        $data=$request->all();
        $drug=$this->drugStrengthService->create($data);

        return response($drug,201);
    }

    public function update($id,Request $request){
        $drug = $this->drugStrengthService->find($id);

        $validate=$this->drugStrengthService->validateUpdate($request,$drug->id);

        if($validate){
            return response($validate->errors(),400);
        }

        $data=$request->all();
        $drug=$this->drugStrengthService->update($id,$data);

        return response($drug,200);
    }

    public function delete($id){
        try {
            $this->drugStrengthService->delete($id);
            return response(null,204);
        } catch(Exception $e) {
            $errRespnse = ["error" => $e->getMessage()];
            return response($errRespnse,404);
        }
    }
}
