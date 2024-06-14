<?php

use App\Http\Controllers\CaloriesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Display the form to get nutrition information
Route::get('/calories', [CaloriesController::class, 'showForm']);

// Handle the form submission and display nutrition information
Route::get('/nutrition', [CaloriesController::class, 'getNutrition']);

