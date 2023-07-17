<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Middleware\TokenVarificationMiddleware;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('pages.auth.registration-page');
});

Route::Post('/User-Login', [UserController::class, 'UserLogin']);
Route::Post('/User-Registration', [UserController::class, 'UserRegistration']);
Route::Post('/Send-OtpToEmail', [UserController::class, 'SendOtpToEmail']);
Route::Post('/Verify-Otp', [UserController::class, 'VerifyOtp']);
//verify Token
Route::Post('/Reset-Password', [UserController::class, 'ResetPassword'])
    ->middleware([TokenVarificationMiddleware::class]);
Route::Post('/ProfileUpdate', [UserController::class, 'ProfileUpdate']);


// Page Routes
Route::get('/userLogin',[UserController::class,'LoginPage']);
Route::get('/userRegistration',[UserController::class,'RegistrationPage']);
Route::get('/sendOtp',[UserController::class,'SendOtpPage']);
Route::get('/verifyOtp',[UserController::class,'VerifyOTPPage']);
Route::get('/resetPassword',[UserController::class,'ResetPasswordPage']);

Route::get('/dashboard',[DashboardController::class,'DashboardPage']);
