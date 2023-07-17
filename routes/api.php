<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::Post('/UserLogin',[UserController::class,'UserLogin']);
Route::Post('/UserRegistration',[UserController::class,'UserRegistration']);
Route::Post('/SendOtpToEmail',[UserController::class,'SendOtpToEmail']);
Route::Post('/VerifyOtp',[UserController::class,'VerifyOtp']);
Route::Post('/SetPassword',[UserController::class,'SetPassword']);
Route::Post('/ProfileUpdate',[UserController::class,'ProfileUpdate']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
