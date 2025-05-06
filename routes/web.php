<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function (): mixed {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\Properties\PropertiesController::class, 'index'])->name('home');


//see the particular property
Route::get('/prop-detaile/{id}', [App\Http\Controllers\Properties\PropertiesController::class, 'singleProp'])->name('prop.detaile');

// contact  Agent 
Route::post('/prop-detaile/{id}', [App\Http\Controllers\Properties\PropertiesController::class, 'makeRequest'])->name('make.request');


// save property

Route::get('/save-prop/{id}', [App\Http\Controllers\Properties\PropertiesController::class, 'saveProp'])->name('save.prop');


//buy page 
Route::get('/props/type/buy', [App\Http\Controllers\Properties\PropertiesController::class, 'buyProps'])->name('prop.buy');

// rent page 
Route::get('/props/type/rent', [App\Http\Controllers\Properties\PropertiesController::class, 'rentProps'])->name('prop.rent');

