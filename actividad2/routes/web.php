<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\User;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $user = Auth::user();

    if ($user->role === 'admin') {
        $usuarios = User::all(); // Obtener todos los usuarios
        return view('dashboard', compact('usuarios'));
    }

    return view('dashboard', ); // Si no es admin carga vista de invitado
})->middleware(['auth', 'verified'])->name('dashboard');

// Nueva ruta exclusiva de admin----------------------------------------------------------------------------------
Route::get('/usuarios', function () {
    if (auth()->user()->role !== 'admin') {
        abort(403, 'No autorizado');
    }

    $usuarios = User::all();
    return view('users', compact('usuarios'));
})->middleware(['auth'])->name('users.index');
//----------------------------------------------------------------------------------------------------------------

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
