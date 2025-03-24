<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CadastroController;
use App\Http\Controllers\UserController;

Route::post('/api/login', [LoginController::class, 'authenticate']);
Route::post('/api/logout', [LoginController::class, 'logout'])->middleware('auth:sanctum');

Route::apiResource('/api/cadastros', CadastroController::class)->middleware('auth:sanctum');;

Route::middleware('auth:sanctum')->get('/api/user', [UserController::class, 'getUser']);

Route::get('/{vue_capture?}', function () {
    return view('welcome');
})->where('vue_capture', '[\/\w\.-]*');