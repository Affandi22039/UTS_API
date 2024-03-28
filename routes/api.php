<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AddressController;

//Route::get('/user', function (Request $request) {
//    return $request->user();
//})->middleware('auth:sanctum');


Route::post('/users', [\App\Http\Controllers\UserController::class, 'register']); 
Route::post('/users/login', [\App\Http\Controllers\UserController::class, 'login']);

Route::middleware(\App\Http\Middleware\ApiAuthMiddleware::class)->group(function () { 
Route::get('/users/current', [\App\Http\Controllers\UserController::class, 'get']); 
Route::patch('/users/current', [\App\Http\Controllers\UserController::class, 'update']); 
Route::delete('/users/logout', [\App\Http\Controllers\UserController::class, 'logout']);
});

Route::post('/contacts', [ContactController::class, 'store']);
Route::get('/contacts', [ContactController::class, 'index']);
Route::put('/contacts/{contact}', [ContactController::class, 'update']);
Route::delete('/contacts/{contact}', [ContactController::class, 'destroy']);

Route::post('/addresses', [AddressController::class, 'store']);
Route::get('/addresses', [AddressController::class, 'index']);
Route::put('/addresses/{address}', [AddressController::class, 'update']);
Route::delete('/addresses/{address}', [AddressController::class, 'destroy']);