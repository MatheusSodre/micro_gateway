<?php

use App\Http\Controllers\Api\Company\CompanyController;
use App\Http\Controllers\Api\Evaluation\EvaluationController;
use App\Http\Controllers\Api\User\{
    AuthController,
    PermissionUserController,
    RegisterController,
    UserController,
};
use Illuminate\Support\Facades\Route;


// Route::get('/companies', [CompanyController::class,'index']);
// Route::post('/companies',[CompanyController::class,'store']);
// Route::get('/companies/{company}',[CompanyController::class,'show']);
// Route::put('/companies/{company}',[CompanyController::class,'update']);
// Route::delete('/companies/{company}',[CompanyController::class,'destroy']);


Route::post('/register',[RegisterController::class, 'store']);
Route::post('/auth',    [AuthController::class, 'authUser']);
Route::post('/logout',  [AuthController::class, 'logout']);
Route::get('/me',       [AuthController::class, 'me']);

Route::post('/user/permission',[PermissionUserController::class, 'addPermissionUser']);
Route::apiResource('/user',UserController::class);

Route::apiResource('/companies',CompanyController::class);







Route::get('/', function () {
    return response()->json(['message' => 'success']);
});
