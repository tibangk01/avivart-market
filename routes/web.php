<?php

namespace App;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VatController;
use App\Http\Controllers\BankController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\WorkController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\AgencyController;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SocietyController;
use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\ExerciseController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\PersonRayController;
use App\Http\Controllers\SalePlaceController;
use App\Http\Controllers\StaffTypeController;
use App\Http\Controllers\ConversionController;
use App\Http\Controllers\ProductRayController;
use App\Http\Controllers\ProductTypeController;
use App\Http\Controllers\CashRegisterController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\CashRegisterOperationController;
use App\Http\Controllers\CashRegisterOperationTypeController;

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

    Route::get('/developer', [PageController::class, 'developer'])->name('developer')->middleware('auth');

    # Auth :
    Route::middleware('guest')->group(function () {

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

Route::middleware('auth')->group(function () {

    /** Societies routes */
    Route::resource('society', SocietyController::class)
        ->only(['show', 'edit', 'update']);
    /** End Societies routes */

    /** Agencies routes */
    Route::resource('agency', AgencyController::class);
    /** End Agencies routes */

    /** Sale Places routes */
    Route::resource('sale_place', SalePlaceController::class);
    /** End Sale Places routes */

    /** Products routes */
    Route::resource('product', ProductController::class);
    /** End Products routes */

    /** Libraries routes */
    Route::resource('library', LibraryController::class);
    /** End Libraries routes */

    /** staff types routes */
    Route::resource('staff_type', StaffTypeController::class);
    /** End staff types routes */

    /** works routes */
    Route::resource('work', WorkController::class);
    /** End works routes */

    /** vats routes */
    Route::resource('vat', VatController::class);
    /** End vats routes */

    /** discounts routes */
    Route::resource('discount', DiscountController::class);
    /** End discounts routes */

    /** currencies routes */
    Route::resource('currency', CurrencyController::class);
    /** End currencies routes */

    /** conversions routes */
    Route::resource('conversion', ConversionController::class);
    /** End conversions routes */

    /** customers routes */
    Route::resource('customer', CustomerController::class);
    /** End customers routes */

    /** providers routes */
    Route::resource('provider', ProviderController::class);
    /** End providers routes */

    /** exercises routes */
    Route::resource('exercise', ExerciseController::class);
    /** End exercises routes */

    /** orders routes */
    Route::resource('order', OrderController::class);
    /** End orders routes */

    /** person rays routes */
    Route::resource('person_ray', PersonRayController::class);
    /** End person rays routes */

    /** product rays routes */
    Route::resource('product_ray', ProductRayController::class);
    /** End product rays routes */

    /** product types routes */
    Route::resource('product_type', ProductTypeController::class);
    /** End product types routes */

    /** product categories routes */
    Route::resource('product_category', ProductCategoryController::class);
    /** End product categories routes */

    /** banks routes */
    Route::resource('bank', BankController::class);
    /** End banks routes */

    /** cash register routes */
    Route::resource('cash_register', CashRegisterController::class);
    /** End cash register routes */

    /** cash register operations routes */
    Route::resource('cash_register_operation', CashRegisterOperationController::class);
    /** End cash register operations routes */

    /** cash register operations types routes */
    Route::resource('cash_register_operation_type', CashRegisterOperationTypeController::class);
    /** End cash register operations types routes */

    /** staffs routes */
    Route::resource('staff', StaffController::class);
    /** End staffs routes */

});
