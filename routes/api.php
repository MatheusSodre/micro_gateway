<?php


use App\Http\Controllers\Api\Evaluation\EvaluationController;
use Illuminate\Support\Facades\Route;

Route::get('/evaluations/{company}',[EvaluationController::class,'index']);

Route::get('/', function () {
    return response()->json(['message' => 'success']);
});
