<?php

namespace App;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AgencyController;
use App\Http\Controllers\SalePlaceController;
use App\Http\Controllers\SocietyController;

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

Route::prefix('/')->name('page.')->group(function () {

    /** Pages routes */

    # Home :
    Route::get('/', [PageController::class, 'index'])->name('index');

    # Login :
    Route::match(['get', 'post'], '/login', [PageController::class, 'login'])->name('login')->middleware('logged');

    # Dash :
    Route::get('/main', [PageController::class, 'main'])->name('main')->middleware('auth');

    # Logout :
    Route::get('/logout', [PageController::class, 'logout'])->name('logout')->middleware('auth');

    /** End Pages routes */

});

/** Societies routes */
Route::resource('society', SocietyController::class)->middleware('auth');
/** End Societies routes */

/** Agencies routes */
Route::resource('agency', AgencyController::class)->middleware('auth');
/** End Agencies routes */

/** Agencies routes */
Route::resource('sale_place', SalePlaceController::class)->middleware('auth');
/** End Societies routes */
