<?php

namespace App;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

use App\Http\Controllers\VatController;
use App\Http\Controllers\BankController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\WorkController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\AgencyController;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\ProformaController;
use App\Http\Controllers\SupplyController;
use App\Http\Controllers\ProductPurchaseController;
use App\Http\Controllers\ProductProformaController;
use App\Http\Controllers\ProductOrderController;
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
use App\Http\Controllers\BankOperationController;
use App\Http\Controllers\BankOperationTypeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DayTransactionController;
use App\Http\Controllers\CashRegisterTransactionController;
use App\Http\Controllers\OrderDeliveryNoteController;
use App\Http\Controllers\PurchaseDeliveryNoteController;
use App\Http\Controllers\TransactionController;

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
Route::get('/clear', function() {
    Artisan::call('config:clear');
    Artisan::call('route:clear');
    Artisan::call('cache:clear');
    Artisan::call('view:clear');
    return "Route, Cache and View are cleared";
});

/** Pages routes */
Route::prefix('/')->name('page.')->group(function () {

    Route::middleware(['auth', 'staff'])->group(function () {
        Route::get('/', [PageController::class, 'index'])->name('index');

        Route::get('/doc', [PageController::class, 'doc'])->name('doc');

        Route::get('/licence', [PageController::class, 'licence'])->name('licence');

        Route::get('/about', [PageController::class, 'about'])->name('about');

        Route::get('/backups', [PageController::class, 'backups'])->name('backups');
    });

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

    Route::middleware(['auth'])->group(function () {
        Route::get('/developer', [PageController::class, 'developer'])->name('developer');
        
        Route::get('/logout', [PageController::class, 'logout'])->name('logout');
    });
});
/** End Pages routes */

Route::middleware(['auth', 'staff'])->group(function () {

    /** Societies routes */
    Route::prefix('/society/printing')->name('society.printing.')->group(function() {
        Route::get('/', [SocietyController::class, 'printingAll'])->name('all');
        Route::get('/{society}', [SocietyController::class, 'printingOne'])->name('one');
    });

    Route::resource('society', SocietyController::class)
        ->only(['show', 'edit', 'update']);
    /** End Societies routes */

    /** Agencies routes */
    Route::prefix('/agency/printing')->name('agency.printing.')->group(function() {
        Route::get('/', [AgencyController::class, 'printingAll'])->name('all');
        Route::get('/{agency}', [AgencyController::class, 'printingOne'])->name('one');
    });

    Route::resource('agency', AgencyController::class);
    /** End Agencies routes */

    /** Sale Places routes */
    Route::prefix('/sale_place/printing')->name('sale_place.printing.')->group(function() {
        Route::get('/', [SalePlaceController::class, 'printingAll'])->name('all');
        Route::get('/{sale_place}', [SalePlaceController::class, 'printingOne'])->name('one');
    });

    Route::resource('sale_place', SalePlaceController::class);
    /** End Sale Places routes */

    /** Products routes */
    Route::prefix('/product/printing')->name('product.printing.')->group(function() {
        Route::get('/', [ProductController::class, 'printingAll'])->name('all');
        Route::get('/{product}', [ProductController::class, 'printingOne'])->name('one');
    });

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
    Route::prefix('/order/printing')->name('order.printing.')->group(function() {
        Route::get('/', [OrderController::class, 'printingAll'])->name('all');
        Route::get('/{order}', [OrderController::class, 'printingOne'])->name('one');
    });
    
    Route::resource('order', OrderController::class);
    /** End orders routes */

    /** supplies routes */
    Route::resource('supply', SupplyController::class);
    /** End supplies routes */

    /** order delivery notes routes */
    Route::resource('order_delivery_note', OrderDeliveryNoteController::class);
    /** End order delivery notes routes */

    /** purchase delivery notes routes */
    Route::resource('purchase_delivery_note', PurchaseDeliveryNoteController::class);
    /** End purchase delivery notes routes */

    /** purchases routes */
    Route::prefix('/purchase/printing')->name('purchase.printing.')->group(function() {
        Route::get('/', [PurchaseController::class, 'printingAll'])->name('all');
        Route::get('/{purchase}', [PurchaseController::class, 'printingOne'])->name('one');
    });
    
    Route::resource('purchase', PurchaseController::class);
    /** End purchases routes */

    /** proformas routes */
    Route::prefix('/proforma/printing')->name('proforma.printing.')->group(function() {
        Route::get('/', [ProformaController::class, 'printingAll'])->name('all');
        Route::get('/{proforma}', [ProformaController::class, 'printingOne'])->name('one');
    });
    
    Route::resource('proforma', ProformaController::class);
    /** End proformas routes */

    /** product proforma routes */
    Route::resource('product_proforma', ProductProformaController::class);
    /** End product proforma routes */

    /** product order routes */
    Route::resource('product_order', ProductOrderController::class);
    /** End product order routes */

    /** product purchase routes */
    Route::resource('product_purchase', ProductPurchaseController::class);
    /** End product purchase routes */

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

    /** bank operations routes */
    Route::resource('bank_operation', BankOperationController::class);
    /** End bank operations routes */

    /** bank operations types routes */
    Route::resource('bank_operation_type', BankOperationTypeController::class);
    /** End bank operations types routes */

    /** staffs routes */
    Route::prefix('/staff/printing')->name('staff.printing.')->group(function() {
        Route::get('/', [StaffController::class, 'printingAll'])->name('all');
        Route::get('/{staff}', [StaffController::class, 'printingOne'])->name('one');
        Route::get('/qrcode/{staff}', [StaffController::class, 'qrcode'])->name('qrcode');
    });

    Route::resource('staff', StaffController::class);
    /** End staffs routes */

    /** transactions routes */
    Route::prefix('/transaction/printing')->name('transaction.printing.')->group(function() {
        Route::get('/', [TransactionController::class, 'printingAll'])->name('all');
        Route::get('/{transaction}', [TransactionController::class, 'printingOne'])->name('one');
    });

    Route::resource('transaction', TransactionController::class)->only('index', 'show');
    /** End transactions routes */

    /** cash register transactions routes */
    Route::resource('cash_register_transaction', CashRegisterTransactionController::class);
    /** End cash register transactions routes */

    /** day transactions routes */
    Route::resource('day_transaction', DayTransactionController::class);
    /** End day transactions routes */

    Route::prefix('/cart')->name('cart.')->group(function() {
        Route::get('/{product}/add', [CartController::class, 'add'])->name('add');
        Route::get('/{row}/remove', [CartController::class, 'remove'])->name('remove');
        Route::get('/{row}/update', [CartController::class, 'update'])->name('update');
        Route::get('/truncate', [CartController::class, 'truncate'])->name('truncate');
        Route::match(['GET', 'POST'], '/checkout', [CartController::class, 'checkout'])->name('checkout');
        Route::post('/load/proforma', [CartController::class, 'loadProforma'])->name('load_proforma');
    });

    Route::prefix('/settings')->name('settings.')->group(function() {
        Route::get('/', [SettingsController::class, 'index'])->name('index');
    });

     Route::prefix('/user')->name('user.')->group(function() {
        Route::get('/{user}/show', [UserController::class, 'show'])->name('show');
        Route::get('/{user}/edit', [UserController::class, 'edit'])->name('edit');
    });

});