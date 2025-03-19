<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ColisController;

// Page d’accueil
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Formulaire d'inscription
Route::get('/register', function () {
    return view('auth.register');
})->name('register.form');

// Traitement de l'inscription
Route::post('/register', [AuthController::class, 'register'])->name('register');

// Formulaire de connexion
Route::get('/login', function () {
    return view('auth.login');
})->name('login.form');

// Traitement de la connexion
Route::post('/login', [AuthController::class, 'login'])->name('login');

// Déconnexion (protégée)
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

// Tableau de bord (protégé)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');

// Ressources colis (protégées)
Route::middleware('auth')->group(function () {
    Route::resource('colis', ColisController::class);
});
