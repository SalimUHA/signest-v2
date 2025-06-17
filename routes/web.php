<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccueilController;


Route::get('/accueil', [AccueilController::class, 'index']); // Page d'accueil
Route::get('/', [AccueilController::class, 'index']); // Page d'accueil
