<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;


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

Route::post('NumberVerify', [ApiController::class, 'NumberVerify']);
Route::post('OTPResend', [ApiController::class, 'OTPResend']);
Route::post('OTPVerify', [ApiController::class, 'OTPVerify']);
Route::post('ProfileGenerate', [ApiController::class, 'ProfileGenerate']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
