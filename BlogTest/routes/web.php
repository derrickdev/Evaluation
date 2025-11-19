<?php

use Illuminate\Support\Facades\Route;
use App\Http\controllers\PostController;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('posts', PostController::class);
Route::get('/posts', PostController::class, 'show')->name('posts');