<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Route::middleware('auth:sanctum')->group(function () {
//     Route::apiResource('bookshelves', BookshelfController::class);
//     Route::apiResource('books', BookController::class);
//     Route::apiResource('chapters', ChapterController::class);
//     Route::apiResource('pages', PageController::class);

//     Route::get('search-books', [SearchController::class, 'search']);
//     Route::get('chapters/{id}/full-content', [ChapterController::class, 'fullContent']);

//     Route::post('/logout', [AuthController::class, 'logout']);
// });
