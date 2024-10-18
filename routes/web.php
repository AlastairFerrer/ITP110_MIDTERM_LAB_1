<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;



Route::get('/', [OrderController::class, 'items']);
Route::post('/search', [OrderController::class, 'search']);
