<?php

namespace App;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AgencyController;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SocietyController;
use App\Http\Controllers\SalePlaceController;

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

/** Pages routes */
Route::prefix('/')->name('page.')->group(function () {

    # Home :
    Route::get('/', [PageController::class, 'index'])->name('index')->middleware('auth');

    # Auth :
    Route::middleware('logged')->group(function () {

        # Login
        Route::match(['get', 'post'], '/login', [PageController::class, 'login'])
            ->name('login');

        # Forgot password
        Route::match(['get', 'post'], '/forgot-password', [PageController::class, 'forgot_password'])
            ->name('forgot_password');

        # Verify mail
        Route::get('/verify-mail', [PageController::class, 'verify_mail'])
            ->name('verify_mail');

        # Reset Password
        Route::match(['get', 'post'], '/reset-password', [PageController::class, 'reset_password'])
            ->name('reset_password');
    });

    # Logout :
    Route::get('/logout', [PageController::class, 'logout'])
        ->name('logout')
        ->middleware('auth');
});
/** End Pages routes */

/** Societies routes */
Route::resource('society', SocietyController::class)
    ->middleware('auth');
/** End Societies routes */

/** Agencies routes */
Route::resource('agency', AgencyController::class)
    ->middleware('auth');
/** End Agencies routes */

/** Sale Places routes */
Route::resource('sale_place', SalePlaceController::class)
    ->middleware('auth');
/** End Sale Places routes */

/** Products routes */
Route::resource('product', ProductController::class)
    ->middleware('auth');
/** End Products routes */

/** Libraries routes */
Route::resource('library', LibraryController::class)
    ->middleware('auth');
/** End Libraries routes */
