<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DemandeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;

// Routes publiques
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/prestations', [HomeController::class, 'prestations'])->name('prestations');
Route::get('/prestation/{id}', [HomeController::class, 'prestation'])->name('prestation.show');
Route::get('/qui-sommes-nous', [HomeController::class, 'about'])->name('about');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::post('/contact', [HomeController::class, 'sendContact'])->name('contact.send');
Route::get('/faq', [HomeController::class, 'faq'])->name('faq');
Route::get('/politique-confidentialite', [HomeController::class, 'privacy'])->name('privacy');
Route::get('/conditions-generales', [HomeController::class, 'terms'])->name('terms');

// Routes d'authentification
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Routes de demande de prestation
Route::get('/demande/{prestation_id}', [DemandeController::class, 'create'])->name('demande.create');
Route::post('/demande', [DemandeController::class, 'store'])->name('demande.store');

// Routes Admin (protégées)
Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    // Gestion des demandes
    Route::get('/demandes', [AdminController::class, 'demandes'])->name('demandes');
    Route::get('/demande/{id}', [AdminController::class, 'showDemande'])->name('demande.show');
    Route::post('/demande/{id}/statut', [AdminController::class, 'updateStatut'])->name('demande.statut');
    Route::post('/demande/{id}/update', [AdminController::class, 'updateDemande'])->name('demande.update');
    Route::post('/demande/{id}/facture', [AdminController::class, 'sendFacture'])->name('demande.facture');

    // Gestion des clients
    Route::get('/clients', [AdminController::class, 'clients'])->name('clients');
    Route::get('/client/create', [AdminController::class, 'createClient'])->name('client.create');
    Route::post('/client', [AdminController::class, 'storeClient'])->name('client.store');
    Route::get('/client/{id}', [AdminController::class, 'showClient'])->name('client.show');
    Route::delete('/client/{id}', [AdminController::class, 'deleteClient'])->name('client.delete');
});

// Routes Client (protégées)
Route::prefix('client')->name('client.')->middleware(['auth', 'client'])->group(function () {
    Route::get('/dashboard', [ClientController::class, 'dashboard'])->name('dashboard');
    Route::get('/demande/{id}', [ClientController::class, 'showDemande'])->name('demande.show');
});
