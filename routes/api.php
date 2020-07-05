<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


/************************ Drugs ***************************/
Route::get("drugs","DrugController@all");
Route::get("drugs/search","DrugController@search");
Route::get('drugs/{id}',"drugController@find");
Route::get('drugs/{id}/elementPrescriptions',"drugController@getElementPrescriptions");
Route::post("drugs","DrugController@create");
Route::post('drugs/{id}', "DrugController@update");
Route::delete('drugs/{id}',"DrugController@delete");


/*******************DrugTypes******************************/

Route::get("drugTypes","DrugTypeController@all");
Route::get("drugTypes/{id}","DrugTypeController@find");

/********************DrugForms***************************/

Route::get("drugForms","DrugFormController@all");
Route::get("drugForms/{id}","DrugFormController@find");

/*************************DrugStrengths******************/

Route::get("drugStrengths","DrugStrengthController@all");
Route::get("drugStrengths/{id}","DrugStrengthController@find");

/******************************ElementPrescription*****************/

Route::get('ElementPrescriptions',"ElementPrescriptionController@all" );
Route::get('ElementPrescriptions/{id}',"ElementPrescriptionController@find" );
Route::post('ElementPrescriptions',"ElementPrescriptionController@create" );
Route::put('ElementPrescriptions/{id}',"ElementPrescriptionController@update" );
Route::delete('ElementPrescriptions/{id}',"ElementPrescriptionController@delete" );


/*****************************Pharmacist**********************************/
Route::get('Pharmacist',"PharmacistController@all");
Route::get("Pharmacist/search","PharmacistController@search");
Route::get('Pharmacist/{id}',"PharmacistController@find");
Route::post('Pharmacist',"PharmacistController@create");
Route::post('Pharmacist/{id}',"PharmacistController@update");
Route::delete('Pharmacist/{id}',"PharmacistController@delete");






