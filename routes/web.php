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
// Route::get('compt/export', [CompteController::class, 'export'])->name('compt.export');
Route::get('beneficiaire/export', [beneficiaireController::class, 'export'])->name('beneficiaire.export');
Route::get('paiements/{id}/export', [PaiementController::class, 'export'])->name('paiements.export');

// Importation des comptes
// Exporter et importer les comptes
Route::get('comptes/export', [CompteController::class, 'export'])->name('compte.export');
Route::post('comptes/import', [CompteController::class, 'import'])->name('compte.import');
Route::post('beneficiaire/import', [beneficiaireController::class, 'import'])->name('beneficiaire.import');
Route::get('paiements/{id}/import', [PaiementController::class, 'export'])->name('paiements.import');

Route::get('beneficiaire/export', [beneficiaireController::class, 'export'])->name('beneficiaire.export');

// Importation des comptes
Route::post('comptes/import', [CompteController::class, 'import'])->name('compte.import');
Route::post('beneficiaire/import', [beneficiaireController::class, 'import'])->name('beneficiaire.import');

Route::get('/comptes', [CompteController::class, 'index'])->name('compte.index');
Route::get('/comptes/create', [CompteController::class, 'create'])->name('compte.create');
Route::post('/comptes', [CompteController::class, 'store'])->name('compte.store');
Route::get('/comptes/{compte}/edit', [CompteController::class, 'edit'])->name('compte.edit');
Route::put('/comptes/{compte}', [CompteController::class, 'update'])->name('compte.update');
Route::delete('/comptes/{compte}', [CompteController::class, 'destroy'])->name('compte.destroy');
// pour la table beneficaire
Route::get('/beneficiaires', [beneficiaireController::class, 'index'])->name('beneficiaire.index');
Route::get('/beneficiaires/create', [beneficiaireController::class, 'create'])->name('beneficiaire.create');
Route::post('/beneficiaires', [beneficiaireController::class, 'store'])->name('beneficiaire.store');
Route::get('/beneficiaires/{beneficiaire}/edit', [beneficiaireController::class, 'edit'])->name('beneficiaire.edit');
Route::put('/beneficiaires/{beneficiaire}', [beneficiaireController::class, 'update'])->name('beneficiaire.update');
Route::delete('/beneficiaires/{beneficiaire}', [beneficiaireController::class, 'destroy'])->name('beneficiaire.destroy');

// Routes pour les paiements
Route::resource('paiements', PaiementController::class);



// Routes poue les Taxes

Route::resource('taxes', TaxeController::class);