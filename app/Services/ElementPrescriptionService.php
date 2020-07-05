<?php

namespace App\Services;

use App\Repositories\ElementPrescriptionRepository;
use App\Services\DrugFormService;
use App\Services\DrugStrengthService;
use App\Services\DrugTypeService;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ElementPrescriptionService{

    private $elementPrescriptionRepository;
    private $drugFormService;
    private $drugStrengthService;
    private $drugTypeService;



    public function __construct(ElementPrescriptionRepository $elementPrescriptionRepository,DrugFormService $drugFormService, DrugStrengthService $drugStrengthService,DrugTypeService $drugTypeService)
    {
        $this->elementPrescriptionRepository=$elementPrescriptionRepository;
        $this->drugFormService=$drugFormService;
        $this->drugStrengthService=$drugStrengthService;
        $this->drugTypeService=$drugTypeService;
    }

    public function all(){

        return $this->elementPrescriptionRepository->all();
    }


    public function find($id){

        return $this->elementPrescriptionRepository->find($id);
    }


    public function validateCreateElementPrescription(Request $request) {

            $validator = Validator::make($request->all(), [
                'drug_id' => 'bail|required|',
                'drug_type_id' => 'bail|required',
                'drug_form_id'=>'bail|required',
                'drug_strength_id'=>'bail|required',
                'size'=>'bail|required',
                'price'=>'bail|required',

            ]);

            if($validator->fails())
                return $validator;
            else
            return null;

          /*  $validatorType=$this->drugTypeService->validateCreate($request);
            $validatorForm=$this->drugFormService->validateCreate($request);
            $validatorStrength=$this->drugStrengthService->validateCreate($request);
            $validatorElement= Validator::make($request->all(),[
                'size'=>'bail|required',
                'price'=>'bail|required',
            ]);

            if(($validatorType && $validatorType->fails()) || ($validatorForm && $validatorForm->fails())|| ( $validatorStrength && $validatorStrength->fails())|| ($validatorElement && $validatorElement->fails())) {

                if($validatorType && $validatorForm && $validatorStrength && $validatorElement)
                    $errors = $validatorType->errors()->merge($validatorForm->errors())->merge($validatorStrength->errors())->merge($validatorElement->errors());

                elseif($validatorType)
                    $errors = $validatorType->errors();
                elseif($validatorForm)
                    $errors = $validatorForm->errors();
                elseif($validatorStrength)
                    $errors = $validatorStrength->errors();
                else
                    $errors = $validatorElement->errors();

                return $errors;
            }
            else {

                return null;
            }*/


    }

    public function create($data){

        return $this->elementPrescriptionRepository->create($data);
    }


    public function update($id,$data){

        return $this->elementPrescriptionRepository->update($id,$data);
    }

    public function validateUpdateElementPrescription(Request $request) {


        $validator = Validator::make($request->all(), [
            'drug_id' => 'bail|required|',
            'drug_type_id' => 'bail|required',
            'drug_form_id'=>'bail|required',
            'drug_strength_id'=>'bail|required',
            'size'=>'bail|required',
            'price'=>'bail|required',
        ]);

        if($validator->fails())
            return $validator;
        else
            return null;

    }

    public function delete($id){

        return $this->elementPrescriptionRepository->delete($id);
    }



}
