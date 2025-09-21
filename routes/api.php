<?php

use App\Http\Controllers\Login\CadastrarUsuarioController;
use App\Http\Controllers\Login\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::post('cadastro', CadastrarUsuarioController::class);
    Route::get('login', LoginController::class);

    Route::middleware('auth:sanctum')->group(function () {
        // Route::get('/user', function (Request $request) {
        //     return $request->user();
        // });
    });
});
