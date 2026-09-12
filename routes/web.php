<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| Rotas de Carros - Matheus
|--------------------------------------------------------------------------
| Exemplo de uso do middleware de role:
| Route::middleware(['auth', 'role:admin,gerente'])->group(function () {
|     Route::resource('carros', CarroController::class);
| });
*/

// TODO: Matheus adiciona aqui as rotas do CarroController (resource)

/*
|--------------------------------------------------------------------------
| Rotas de Marca / Relacionamento - Gabriel
|--------------------------------------------------------------------------
*/

// TODO: Gabriel adiciona aqui as rotas de Marca e as views com relacionamento

require __DIR__.'/auth.php';