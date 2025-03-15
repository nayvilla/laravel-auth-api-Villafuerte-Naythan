<?php

use App\Http\Controllers\AuthApi\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;

// Login para obtener el token
Route::post('/login', [LoginController::class, 'login']);

// Logout para eliminar el token (necesita autenticación con Sanctum)
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth:sanctum');

// Registro por medio de API no le ponemos bajo el middleware ya que ningun usuario podra registrarse porque no tiene login
Route::post('/register', [RegisteredUserController::class, 'registerApi']);

// Ruta protegida, solo accesible con un token válido
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return response()->json([
        'user' => $request->user(),
        'message' => 'Acceso permitido con token Sanctum',
    ]);

});

