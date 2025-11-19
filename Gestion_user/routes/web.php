<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\GestUserController;

Route::get('/', function () {
    return view('welcome');
});
Route::apiresource('gest_users', GestUserController::class);