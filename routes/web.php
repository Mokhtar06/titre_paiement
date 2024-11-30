<?php

use App\Http\Controllers\CompteController;
use App\Http\Controllers\beneficiaireController;
use App\Http\Controllers\PaiementController;
use App\Http\Controllers\TaxeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('paiements.welcome');
});

// Exportation des comptes
Route::get('compt/export', [CompteController::class, 'export'])->name('compt.export');
Route::get('beneficiaire/export', [beneficiaireController::class, 'export'])->name('beneficiaire.export');
Route::get('paiements/{id}/export', [PaiementController::class, 'export'])->name('paiements.export');

// Importation des comptes
Route::post('compt/import', [CompteController::class, 'import'])->name('compt.import');
Route::post('beneficiaire/import', [beneficiaireController::class, 'import'])->name('beneficiaire.import');
Route::get('paiements/{id}/import', [PaiementController::class, 'export'])->name('paiements.import');


// Routes pour les comptes
Route::resource('compt', CompteController::class);

// Routes pour les bénéficiaires
Route::resource('beneficiaire', beneficiaireController::class);

// Routes pour les paiements
Route::resource('paiements', PaiementController::class);



// Routes poue les Taxes

Route::resource('taxes', TaxeController::class);