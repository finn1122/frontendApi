<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\MovieController;



Route::get('', [HomeController::class, 'index']);

//Route::get('/movies', [MovieController::class, 'movies']);

