<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LivreController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/livres', [LivreController::class, 'index']); // Liste des livres
Route::post('/livres/store', [LivreController::class, 'store']); // Création d'un livre
Route::get('/livres/show/{id}', [LivreController::class, 'show']); // Récupération d'un livre
Route::put('/livres/update/{id}', [LivreController::class, 'update']); // Mise à jour d'un livre
Route::delete('/livres/destroy/{id}', [LivreController::class, 'destroy']); // Suppression d'un livre
