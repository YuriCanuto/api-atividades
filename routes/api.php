<?php

use App\Http\Controllers\Login\CadastrarUsuarioController;
use App\Http\Controllers\Login\LoginController;
use App\Http\Controllers\Login\RecuperarSenhaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::post('cadastro', CadastrarUsuarioController::class);
    Route::get('login', LoginController::class);
    Route::post('recuperar-senha', RecuperarSenhaController::class);
    // Route::post('/resetar_senha',  [PasswordResetController::class, 'resetPassword']);

    Route::middleware('auth:sanctum')->group(function () {
        // Route::get('/user', function (Request $request) {
        //     return $request->user();
        // });
    });
});
