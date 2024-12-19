<?php

use App\Http\Controllers\UserController;
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

// ====================================================
// ==================== Documentation ==================
// ====================================================

Route::get('/', [UserController::class, 'documentation'])->middleware('auth');
Route::get('/documentation', [UserController::class, 'documentation'])->middleware('auth');

// ====================================================
// ==================== Login admin ===================
// ====================================================

Route::get('/login', [UserController::class, 'cms_login']);
Route::post('/login_submit', [UserController::class, 'cms_login_submit']);
Route::get('/logout', [UserController::class, 'cms_logout']);

// ====================================================
// ==================== Nouvelles =====================
// ====================================================

Route::get('/nouvelles', [UserController::class, "nouvelles"])->middleware('auth');
Route::get('/nouvelles/ajouter', [UserController::class, "ajouter_nouvelle"])->middleware('auth');
Route::post('/nouvelles/ajouter_submit', [UserController::class, "ajouter_nouvelle_submit"])->middleware('auth');
Route::get('/nouvelles/modifier', [UserController::class, "modifier_nouvelle"])->middleware('auth');
Route::post('/nouvelles/modifier_submit', [UserController::class, "modifier_nouvelle_submit"])->middleware('auth');
Route::get('/nouvelles/supprimer', [UserController::class, "supprimer_nouvelle"])->middleware('auth');

// ====================================================
// ==================== Statistiques ==================
// ====================================================

Route::get('/statistiques', [UserController::class, "statistiques"])->middleware('auth');

// ====================================================
// ==================== Produits ======================
// ====================================================

Route::get('/produits', [UserController::class, "produits"])->middleware('auth');
Route::get('/produits/ajouter', [UserController::class, "ajouter_produit"])->middleware('auth');
Route::post('/produits/ajouter_submit', [UserController::class, "ajouter_produit_submit"])->middleware('auth');
Route::get('/produits/modifier', [UserController::class, "modifier_produit"])->middleware('auth');
Route::post('produits/modifier_submit', [UserController::class, "modifier_produit_submit"])->middleware('auth');
Route::get('/produits/supprimer', [UserController::class, "supprimer_produit"])->middleware('auth');

// ==================== Paliers =======================

Route::get('/produits/paliers', [UserController::class, "paliers"])->middleware('auth');
Route::get('/produits/paliers/ajouter', [UserController::class, "ajouter_palier"])->middleware('auth');
Route::post('/produits/paliers/ajouter_submit', [UserController::class, "ajouter_palier_submit"])->middleware('auth');
Route::get('/produits/paliers/modifier', [UserController::class, "modifier_palier"])->middleware('auth');
Route::post('/produits/paliers/modifier_submit', [UserController::class, "modifier_palier_submit"])->middleware('auth');
Route::get('/produits/paliers/supprimer', [UserController::class, "supprimer_palier"])->middleware('auth');

// ====================================================
// ==================== Precommande ===================
// ====================================================

Route::get('/precommande', [UserController::class, "precommande"])->middleware('auth');

// ====================================================
// ==================== Infolettre ===================
// ====================================================

Route::get('/infolettre', [UserController::class, "infolettre"])->middleware('auth');

// ====================================================
// ==================== Partenaires ===================
// ====================================================

Route::get('/partenaires', [UserController::class, "partenaires"])->middleware('auth');
Route::get('/partenaires/ajouter', [UserController::class, "ajouter_partenaire"])->middleware('auth');
Route::post('/partenaires/ajouter_submit', [UserController::class, "ajouter_partenaire_submit"])->middleware('auth');
Route::get('/partenaires/modifier', [UserController::class, "modifier_partenaire"])->middleware('auth');
Route::post('/partenaires/modifier_submit', [UserController::class, "modifier_partenaire_submit"])->middleware('auth');
Route::get('/partenaires/supprimer', [UserController::class, "supprimer_partenaire"])->middleware('auth');

// ====================================================
// ================= Textes dynamiques ================
// ====================================================

Route::get('/textes_dynamiques', [UserController::class, "textes_dynamiques"])->middleware('auth');
Route::get('/textes_dynamiques/modifier', [UserController::class, "modifier_texte_dynamique"])->middleware('auth');
Route::post('/textes_dynamiques/modifier_submit', [UserController::class, "modifier_texte_dynamique_submit"])->middleware('auth');