<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\BooksController;

Route::group(['prefix' => 'books'], function () {
    Route::get('/', [BooksController::class, 'list']);
    Route::post('/', [BooksController::class, 'create']);
    Route::get('/{book}', [BooksController::class, 'show']);
    Route::put('/{book}', [BooksController::class, 'update']);
    Route::delete('/{book}', [BooksController::class, 'delete']);
});
