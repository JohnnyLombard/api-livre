<?php

use App\Http\Controllers\LivreController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [LivreController::class, 'home'])->name('home'); // accueil

Route::get('/livres', [LivreController::class, 'indexWeb'])->name('livres.index'); // Liste des livres

Route::get('/livres/create-new', [LivreController::class, 'createWeb'])->name('livres.create'); // vue creation
Route::post('/livres/create', [LivreController::class, 'storeWeb'])->name('livres.crea'); // Création d'un livre

Route::get('/livres/show/{id}', [LivreController::class, 'showWeb'])->name('livres.show'); // Récupération d'un livre

Route::get('/livres/edit/{id}', [LivreController::class, 'editWeb'])->name('livres.edit'); // Vue edit livre
Route::put('/livres/update/{id}', [LivreController::class, 'updateWeb'])->name('livres.update'); // Mise à jour d'un livre

Route::get('/livres/delete/{id}', [LivreController::class, 'deleteWeb'])->name('livres.delete'); // vue suppression livre
Route::delete('/livres/destroy/{id}', [LivreController::class, 'destroyWeb'])->name('livres.destroy'); // Suppression d'un livre

