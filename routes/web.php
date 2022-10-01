<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\TurnController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::resource('movies', MovieController::class);
Route::resource('turns', TurnController::class);

//Route::get('movies/assign', MovieController::class)->name('movies.assign');

Route::get('/assign/turn', [MovieController::class, 'assign'])->name('movies.assign');
Route::post('/assign/guardar', [MovieController::class, 'guardarAsignacion'])->name('movies.guardarAsignacion');


