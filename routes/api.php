<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\SimilarController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\PromoController;
use App\Http\Controllers\FilmController;

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

Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);

Route::post('/register', [AuthController::class, 'register']);

Route::middleware('auth:sanctum')->resource('user', UserController::class);

Route::resource('films', FilmController::class);

Route::prefix('films/{id}')->middleware('auth:sanctum')->group(function () {
    Route::get('/similar', [SimilarController::class, 'index']);
    Route::post('/favorite', [FavoriteController::class, 'store']);
    Route::delete('/favorite', [FavoriteController::class, 'destroy']);
    Route::get('/comments', [CommentController::class, 'index']);
    Route::post('/comments', [CommentController::class, 'store']);
});

Route::resource('genres', GenreController::class);

Route::resource('comments', CommentController::class);

Route::resource('favorite', FavoriteController::class);

Route::prefix('promo')->group(function () {
    Route::get('/', [PromoController::class, 'index']);
    Route::post('/{id}', [PromoController::class, 'store']);
    Route::delete('/{id}', [PromoController::class, 'destroy']);
});
