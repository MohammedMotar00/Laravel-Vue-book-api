<?php

use App\Http\Controllers\AuthorsController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\GenresController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
  return $request->user();
});

Route::get('/books', [BooksController::class, 'index'])->middleware('throttle:1000,1');
Route::get('/books/{id}', [BooksController::class, 'show'])->middleware('throttle:1000,1');

Route::get('/authors', [AuthorsController::class, 'index'])->middleware('throttle:1000,1');
Route::get('/authors/{id}', [AuthorsController::class, 'show'])->middleware('throttle:1000,1');

Route::get('/genres', [GenresController::class, 'index'])->middleware('throttle:1000,1');
Route::get('/genres/{id}', [GenresController::class, 'show'])->middleware('throttle:1000,1');