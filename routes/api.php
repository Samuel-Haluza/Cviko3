<?php

use App\Http\Controllers\BookApiController;
use App\Http\Controllers\BookRestController;
use App\Http\Controllers\BookRpcController;
use App\Http\Controllers\BookSacController;
use App\Http\Controllers\Api\TimeRestController;
use App\Http\Controllers\Rpc\TimeRpcController;
use Illuminate\Support\Facades\Route;

Route::post('/rpc/books/{id}/borrow', [BookRpcController::class, 'borrowBook']);
Route::post('/rpc/books/{id}/return', [BookRpcController::class, 'returnBook']);

Route::get('/sac/books/{id}', BookSacController::class);

Route::prefix('rest')->group(function () {
    Route::get('books', [BookRestController::class, 'index']);        // zoznam
    Route::get('books/create', [BookRestController::class, 'create']); // formulár create
    Route::post('books', [BookRestController::class, 'store']);       // uloženie
    Route::get('books/{book}', [BookRestController::class, 'show']);  // detail
    Route::get('books/{book}/edit', [BookRestController::class, 'edit']); // formulár edit
    Route::put('books/{book}', [BookRestController::class, 'update']); // update
    Route::delete('books/{book}', [BookRestController::class, 'destroy']); // delete
});

Route::prefix('restapi')->group(function () {
    Route::get('books', [BookApiController::class, 'index']);
    Route::post('books', [BookApiController::class, 'store']);
    Route::get('books/{book}', [BookApiController::class, 'show']);
    Route::put('books/{book}', [BookApiController::class, 'update']);
    Route::delete('books/{book}', [BookApiController::class, 'destroy']);
});



Route::get('/rest/time', [TimeRestController::class, 'getCurrentTime']);
Route::get('/rpc/time', [TimeRpcController::class, 'getCurrentTime']);