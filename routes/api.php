<?php

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

Route::prefix('films')->middleware('auth:sanctum')->group(function () {
    Route::withoutMiddleware('auth:sanctum')->group(function () {
        Route::get('/', [FilmController::class, 'index']);
        Route::get('/{id}', [FilmController::class, 'show']);
        Route::get('/{id}/similar', [SimilarController::class, 'index']);
        Route::get('/{id}/comments', [CommentController::class, 'index']);
    });
    Route::post('/', [FilmController::class, 'store']);
    Route::patch('/{id}', [FilmController::class, 'update']);
    Route::post('/{id}/comments', [CommentController::class, 'store']);
    Route::post('/{id}/favorite', [FavoriteController::class, 'store']);
    Route::delete('/{id}/favorite', [FavoriteController::class, 'destroy']);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::get('genres', [GenreController::class, 'index'])->withoutMiddleware('auth:sanctum');
    Route::patch('genres/{id}', [GenreController::class, 'update']);
    Route::resource('favorite', FavoriteController::class);
    Route::resource('comments', CommentController::class);
    Route::prefix('promo')->group(function () {
        Route::get('/', [PromoController::class, 'index'])->withoutMiddleware('auth:sanctum');
        Route::post('/{id}', [PromoController::class, 'store']);
        Route::delete('/{id}', [PromoController::class, 'destroy']);
    });
});
