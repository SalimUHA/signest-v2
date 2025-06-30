<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccueilController;
use App\Http\Controllers\AproposController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\MengController;

Route::get('/accueil', [AccueilController::class, 'index']); //Page d'accueil
Route::get('/', [AccueilController::class, 'index']); //Page d'accueil

Route::get('/apropos', [AproposController::class, 'index']); //Page A Propos

Route::get('/contact', [ContactController::class, 'show'])->name('contact.show'); //Page Contact
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send') ->middleware('throttle:5,1');;//Page Contact

Route::get('/service/{slug}', [ServiceController::class, 'show'])->name('service.show'); //Pages pour les cartes

Route::get('/realisations', [App\Http\Controllers\RealisationsController::class, 'index'])->name('realisations'); //realisations
Route::get('/meng', [MengController::class, 'index']);

Route::get('/nosservices', [AccueilController::class, 'servicesPage'])->name('services.index');
