<?php

use App\Http\Controllers\Api\Company\CompanyController;
use App\Http\Controllers\Api\Evaluation\EvaluationController;
use Illuminate\Support\Facades\Route;


Route::get('/companies',[CompanyController::class,'index']);
Route::get('/companies/{company}',[CompanyController::class,'show']);
Route::post('/companies',[CompanyController::class,'store']);

Route::get('/', function () {
    return response()->json(['message' => 'success']);
});
