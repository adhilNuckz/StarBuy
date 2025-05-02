<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function (): mixed {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
