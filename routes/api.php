<?php

use App\Http\Controllers\Api\Company\CompanyController;
use App\Http\Controllers\Api\Evaluation\EvaluationController;
use App\Http\Controllers\Api\User\RegisterController;
use Illuminate\Support\Facades\Route;


Route::get('/companies',[CompanyController::class,'index']);
Route::post('/companies',[CompanyController::class,'store']);
Route::get('/companies/{company}',[CompanyController::class,'show']);
Route::put('/companies/{company}',[CompanyController::class,'update']);
Route::delete('/companies/{company}',[CompanyController::class,'destroy']);

Route::post('/register',[RegisterController::class, 'store']);


Route::get('/', function () {
    return response()->json(['message' => 'success']);
});
