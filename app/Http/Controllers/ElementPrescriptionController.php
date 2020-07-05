<?php

namespace App\Http\Controllers;

use App\Services\ElementPrescriptionService;
use App\Services\DrugService;
use App\Services\DrugTypeService;
use App\Services\DrugFormService;
use App\Services\DrugStrengthService;
use App\Http\Resources\ElementPrescriptionRessource;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class ElementPrescriptionController extends Controller{

    private $elementPrescriptionService;
    private $drugService;
    private $drugTypeService;
    private $drugFormService;
    private $StrengthService;

    public function __construct(ElementPrescriptionService $elementPrescriptionService,DrugService $drugService, DrugTypeService $drugTypeService,DrugFormService $drugFormService,DrugStrengthService $drugStrengthService )
    {
        $this->elementPrescriptionService=$elementPrescriptionService;
        $this->drugService =$drugService;
        $this->drugTypeService =$drugTypeService;
       $this->drugFormService =$drugFormService;
        $this->StrengthService =$drugStrengthService;
    }

    public function all(){

      // return $this->ElementPrescriptionService->all();
        return ElementPrescriptionRessource::collection($this->elementPrescriptionService->all());
    }

    public function find($id){

        try {
            return new ElementPrescriptionRessource($this->elementPrescriptionService->find($id));

           } catch(Exception $e) {

               $errRespnse = ["error" =>$e->getMessage()];
               return response($errRespnse,404);
           }


    }

    public function create(Request $request){

        try {
            $drugId=$this->drugService->find($request->drug_id);
            $drugType = $this->drugTypeService->find($request->drug_type_id);
            $drugForm = $this->drugFormService->find($request->drug_form_id);
            $drugStrength = $this->StrengthService->find($request->drug_strength_id);

            $request["drug_id"] =$drugId->id;
            $request["drug_type_id"] =$drugType->id;
            $request["drug_form_id"] =$drugForm->id;
            $request["drug_strength_id"] =$drugStrength->id;

            $validate=$this->elementPrescriptionService->validateCreateElementPrescription($request);

            if($validate){

                return response($validate->errors(),400);
            }

            $drug = $this->drugService->find($request->drug_id);
            $drugType = $this->drugTypeService->find($request->drug_type_id);
            $drugForm = $this->drugFormService->find($request->drug_form_id);
            $drugStrength = $this->StrengthService->find($request->drug_strength_id);

            $data=$request->all();

            $data["drug_id"] = $drug->id;
            $data["drug_type_id"] = $drugType->id;
            $data["drug_form_id"] = $drugForm->id;
            $data["drug_strength_id"] = $drugStrength->id;

            $request["drug_id"] =$drugId->id;
            $request["drug_type_id"] =$drugType->id;
            $request["drug_form_id"] =$drugForm->id;
            $request["drug_strength_id"] =$drugStrength->id;

            $element = $this->elementPrescriptionService->create($data);

            return new ElementPrescriptionRessource($element);


        } catch(Exception $e) {

            return ($e->getMessage());

         }
    }

    public function update($id, Request $request){

            $validate=$this->elementPrescriptionService->validateUpdateElementPrescription($request);

            $drugId = $this->drugService->find($request->drug_id);
            $drugType = $this->drugTypeService->find($request->drug_type_id);
            $drugForm = $this->drugFormService->find($request->drug_form_id);
            $drugStrength = $this->StrengthService->find($request->drug_strength_id);

            $request["drug_id"] =$drugId->id;
            $request["drug_type_id"] =$drugType->id;
            $request["drug_form_id"] =$drugForm->id;
            $request["drug_strength_id"] =$drugStrength->id;

            if($validate){
             return response($validate->errors(),400);
            }

            $drug = $this->drugService->find($request->drug_id);
            $drugType = $this->drugTypeService->find($request->drug_type_id);
            $drugForm = $this->drugFormService->find($request->drug_form_id);
            $drugStrength = $this->StrengthService->find($request->drug_strength_id);

            $data=$request->all();

            $data["drug_id"] = $drug->id;
            $data["drug_type_id"] = $drugType->id;
            $data["drug_form_id"] = $drugForm->id;
            $data["drug_strength_id"] = $drugStrength->id;

            $request["drug_id"] =$drugId->id;
            $request["drug_type_id"] =$drugType->id;
            $request["drug_form_id"] =$drugForm->id;
            $request["drug_strength_id"] =$drugStrength->id;


            $element=$this->elementPrescriptionService->update($id,$data);

            return response(new ElementPrescriptionRessource($element),200);
    }

    public function delete($id){
            try {

                $this->elementPrescriptionService->delete($id);
                return response(null,204);

            } catch(Exception $e) {

                $errRespnse = ["error" => $e->getMessage()];
                return response($errRespnse,404);
            }
    }

}
