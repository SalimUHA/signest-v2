<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccueilController;
use App\Http\Controllers\AproposController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MengController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RealisationsController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\Admin\ServiceController as AdminServiceController;

/*
|--------------------------------------------------------------------------
| Routes Publiques
|--------------------------------------------------------------------------
*/
Route::get('/', [AccueilController::class, 'index'])->name('accueil');
Route::get('accueil', [AccueilController::class, 'index'])->name('accueil');
Route::get('/nosservices', [AccueilController::class, 'servicesPage'])->name('services.index');
Route::get('/service/{slug}', [ServiceController::class, 'show'])->name('service.show');
Route::get('/apropos', [AproposController::class, 'index'])->name('apropos');
Route::get('/realisations', [RealisationsController::class, 'index'])->name('realisations');
Route::get('/meng', [MengController::class, 'index'])->name('meng');
Route::get('/contact', [ContactController::class, 'show'])->name('contact.show');
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send')->middleware('throttle:5,1');

/*
|--------------------------------------------------------------------------
| Routes d'Administration
|--------------------------------------------------------------------------
*/
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/services', [AdminServiceController::class, 'index'])->name('services.index');
    Route::get('/services/create', [AdminServiceController::class, 'create'])->name('services.create');
    Route::post('/services', [AdminServiceController::class, 'store'])->name('services.store');
    Route::get('/services/{service}/edit', [AdminServiceController::class, 'edit'])->name('services.edit');
    Route::patch('/services/{service}', [AdminServiceController::class, 'update'])->name('services.update');
    Route::delete('/services/{service}', [AdminServiceController::class, 'destroy'])->name('services.destroy');
});

/*
|--------------------------------------------------------------------------
| Routes de Profil Utilisateur
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
