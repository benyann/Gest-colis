<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ColisController;
use App\Http\Controllers\AgenceController;
use App\Http\Controllers\ChauffeurController;
use App\Http\Controllers\ExpeditionController;
use App\Http\Controllers\PaiementController;

// =================== PAGE D’ACCUEIL ===================
Route::get('/', function () {
    return view('Auth.login');
})->name('home');

// =================== AUTHENTIFICATION ===================
// Inscription
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');

// Connexion
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');

// Déconnexion
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

// =================== TABLEAU DE BORD ===================
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');

// =================== ROUTES PROTÉGÉES ===================
Route::middleware('auth')->group(function () {

    // Gestion des colis
    Route::resource('colis', ColisController::class)->parameters([
        'colis' => 'colis'
    ]);

    // Gestion des agences
    Route::resource('agence', AgenceController::class);

    // Gestion des chauffeurs
    Route::resource('chauffeur', ChauffeurController::class);

    // Gestion des expéditions
    Route::resource('expedition', ExpeditionController::class);

    Route::get('/colis/{id}/imprimer-recu', [ColisController::class, 'imprimerRecu'])->name('colis.imprimer-recu');

});
