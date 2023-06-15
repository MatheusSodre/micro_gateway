<?php

use App\Http\Controllers\Api\Account\AccountController;
use App\Http\Controllers\Api\Company\CompanyController;
use App\Http\Controllers\Api\Order\OrderController;
use App\Http\Controllers\Api\sqs\SQSMessagesController;
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

Route::prefix('order')->group(function () {
    Route::middleware('auth:sanctum')->group(function () {
        Route::post('/validator', [OrderController::class, '__invoke'])->name('order.validator');
    });
});
Route::prefix('auth')->group(function () {
    Route::middleware('guest')->group(function () {
        Route::post('/login', [AccountController::class, 'login'])->name('auth.login');
    });
});

Route::prefix('sqs')->group(function () {
    Route::middleware('auth:sanctum')->group(function () {
        Route::get('/messages', [SQSMessagesController::class, 'index'])->name('sqs-messages.index');
    });
});

