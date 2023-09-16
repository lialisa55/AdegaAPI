<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BebidaController;

Route::get('/', function(){
    return response()->json([
        'Success' => true
    ]);
});

Route::get('/bebidas',[BebidaController::class,'index']);
Route::get('/bebidas/{id}',[BebidaController::class,'show']);
Route::post('/bebidas',[BebidaController::class,'store']);
Route::delete('/bebidas/{id}',[BebidaController::class,'destroy']);
Route::put('/bebidas/{id}',[BebidaController::class,'update']);