<?php

use App\Http\Controllers\Api\Company\CompanyController;
use App\Http\Controllers\Api\Evaluation\EvaluationController;
use App\Http\Controllers\Api\User\AuthController;
use App\Http\Controllers\Api\User\PermissionUserController;
use App\Http\Controllers\Api\User\RegisterController;
use Illuminate\Support\Facades\Route;


Route::get('/companies', [CompanyController::class,'index']);
Route::post('/companies',[CompanyController::class,'store']);
Route::get('/companies/{company}',[CompanyController::class,'show']);
Route::put('/companies/{company}',[CompanyController::class,'update']);
Route::delete('/companies/{company}',[CompanyController::class,'destroy']);

Route::post('/register',[RegisterController::class, 'store']);
Route::post('/auth',    [AuthController::class, 'authUser']);
Route::post('/user/permission',[PermissionUserController::class, 'addPermissionUser']);


Route::get('/', function () {
    return response()->json(['message' => 'success']);
});
