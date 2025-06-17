<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccueilController;
use App\Http\Controllers\AproposController;
use App\Http\Controllers\ContactController;

Route::get('/accueil', [AccueilController::class, 'index']); //Page d'accueil
Route::get('/', [AccueilController::class, 'index']); //Page d'accueil

Route::get('/apropos', [AproposController::class, 'index']); //Page A Propos

Route::get('/contact', [ContactController::class, 'show'])->name('contact.show'); //Page Contact
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');//Page Contact
