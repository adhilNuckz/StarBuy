<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function (): mixed {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\Properties\PropertiesController::class, 'index'])->name('home');

Route::get('/prop-detaile/{id}', [App\Http\Controllers\Properties\PropertiesController::class, 'singleProp'])->name('prop.detaile');


Route::post('/prop-detaile/{id}', [App\Http\Controllers\Properties\PropertiesController::class, 'makeRequest'])->name('make.request');
