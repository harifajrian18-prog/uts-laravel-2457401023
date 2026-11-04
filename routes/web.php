<?php

use App\Http\Controllers\CarController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home')->name('home');
Route::resource('cars', CarController::class);
