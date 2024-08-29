<?php

use App\Http\Controllers\Api\PatientController;
use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

require __DIR__.'/auth.php';

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::post('signup',[AuthController::class,'signup']);
Route::post('login',[AuthController::class,'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('patient/appointments', [PatientController::class, 'index']);
    Route::get('patient/dashboard', [PatientController::class, 'dashboard']);
    Route::post('patient', [PatientController::class, 'store']);
    // Define other routes as needed
});
