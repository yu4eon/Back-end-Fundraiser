<?php

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/ajouter_consultation', [ApiController::class, "ajouter_consultation"]);
Route::get('/ajouter_transaction', [ApiController::class, "ajouter_transaction"]);
Route::get('/transactions', [ApiController::class, "transactions"])->middleware('auth:sanctum');
Route::post('/ajouter_precommande', [ApiController::class, "api_ajouter_precommande"])->middleware('auth:sanctum');
Route::get('/precommandes', [ApiController::class, "api_precommandes"])->middleware('auth:sanctum');
Route::post('/login', [ApiController::class, "api_login"]);
Route::post('/register', [ApiController::class, "api_register"]);
Route::get('/produits', [ApiController::class, "api_produits"]);
Route::get('/nouvelles', [ApiController::class, "api_nouvelles"]);
Route::get('/paliers', [ApiController::class, "api_paliers"]);
Route::get('/partenaires', [ApiController::class, "api_partenaires"]);
Route::get('/textes_dynamiques', [ApiController::class, "api_textes_dynamiques"]);
Route::get('/abonner_infolettre', [ApiController::class, "abonner_infolettre"]);
Route::get('/telecharger_abonnes', [ApiController::class, "telecharger_abonnes"]);
