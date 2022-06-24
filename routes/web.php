<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VoteController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\WeaponController;
use App\Http\Controllers\CountryController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/weapons', [WeaponController::class, 'index'])
    ->name('weapons');

Route::post('/weapons', [WeaponController::class, 'store'])
    ->name('weapons.store');

Route::get('/countries', [CountryController::class, 'index'])
    ->name('countries');

Route::post('/countries', [CountryController::class, 'store'])
    ->name('countries.store');

Route::get('/votes', [VoteController::class, 'index'])
    ->name('votes');

Route::get('/results', [ResultController::class, 'index'])
    ->name('results');

Route::post('/results', [ResultController::class, 'store'])
    ->name('results.store');
