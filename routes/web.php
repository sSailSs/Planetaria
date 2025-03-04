<?php

use App\Http\Controllers\PlanetController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Routes pour les planètes
Route::get('/planets', [PlanetController::class, 'index'])->name('planets.index');
Route::get('/planets/create', [PlanetController::class, 'create'])->name('planets.create');
Route::post('/planets', [PlanetController::class, 'store'])->name('planets.store');
Route::get('/planets/compare', [PlanetController::class, 'compare'])->name('planets.compare');


// Authentification
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
