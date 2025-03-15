<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Login para obtener el token
Route::post('/login', [LoginController::class, 'login']);

// Logout para eliminar el token (necesita autenticación con Sanctum)
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth:sanctum');

// Ruta protegida, solo accesible con un token válido
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return response()->json([
        'user' => $request->user(),
        'message' => 'Acceso permitido con token',
    ]);
});
