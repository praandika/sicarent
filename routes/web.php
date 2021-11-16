<?php

use Illuminate\Support\Facades\Route;

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
/** Landing Page*/
Route::get('/', [App\Http\Controllers\LandingController::class, 'index'])->name('landing.page');
Route::get('/carlist', [App\Http\Controllers\LandingController::class, 'carList'])->name('car.list');
Route::get('/look/{id}', [App\Http\Controllers\LandingController::class, 'look'])->name('look');
/** END Landing Page */

// Booking
Route::get('booking', [App\Http\Controllers\BookingController::class, 'booking'])->name('booking');
Route::get('detail/{token}/{id}/{price}', [App\Http\Controllers\BookingController::class, 'detail'])->name('detail');
Route::post('savebook', [App\Http\Controllers\BookingController::class, 'savebook'])->name('savebook');

Route::get('detail/2/{id}/{price}', [App\Http\Controllers\BookingController::class, 'setbook'])->name('setbook');
// END Booking

// Payment
Route::get('confirm/{id}', [App\Http\Controllers\PaymentController::class, 'confirm'])->name('confirm');
Route::post('paymentedit', [App\Http\Controllers\PaymentController::class, 'paymentEdit'])->name('payment.edit');
// END Payment

/**Auth Route */
Auth::routes();
/** END Auth Route */

/** Dashboard */
Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
/** END Dashboard */

/** Google Login */
Route::get('auth/google', [App\Http\Controllers\OAuthController::class, 'redirectToGoogle'])->name('google.login');
Route::get('auth/google/callback', [App\Http\Controllers\OAuthController::class, 'googleCallback'])->name('google.callback');
/** END Google Login */

/** Manage Data User */
Route::prefix('user')->group(function(){
    // Read
    Route::get('/', [App\Http\Controllers\UserController::class, 'index'])->name('user.read');
    // Store
    Route::post('/store', [App\Http\Controllers\UserController::class, 'store'])->name('user.store');
    /**Edit */
    Route::get('/edit/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('user.edit');
    // Update
    Route::post('/update', [App\Http\Controllers\UserController::class, 'update'])->name('user.update');
    /**Change Password Admin */
    Route::post('adminpass', [App\Http\Controllers\UserController::class, 'adminpass'])->name('admin.password');
});
/** END Manage Data User */

// Data Mobil
Route::prefix('car')->group(function(){
    // Read
    Route::get('/', [App\Http\Controllers\CarController::class, 'index'])->name('car.read');
    // Create
    Route::get('/create', [App\Http\Controllers\CarController::class, 'create'])->name('car.create');
    // Store
    Route::post('/store', [App\Http\Controllers\CarController::class, 'store'])->name('car.store');
    /**Edit */
    Route::get('/edit/{id}', [App\Http\Controllers\CarController::class, 'edit'])->name('car.edit');
    // Update
    Route::post('/update', [App\Http\Controllers\CarController::class, 'update'])->name('car.update');
    // Delete
    Route::post('/delete', [App\Http\Controllers\CarController::class, 'delete'])->name('car.delete.all');
});
// END Data Mobil

// Invoice
Route::get('invoice/{invoice}', [App\Http\Controllers\PaymentController::class, 'invoice']);

Route::get('print/{invoice}', [App\Http\Controllers\PaymentController::class, 'printInvoice'])->name('print.invoice');
// END Invoice

// History
Route::get('payment/history', [App\Http\Controllers\PaymentController::class, 'hisPay'])->name('pay.history');

Route::get('book/history', [App\Http\Controllers\BookingController::class, 'hisBook'])->name('book.history');
// END History

// Calendar
Route::get('calendar', [App\Http\Controllers\HomeController::class, 'calendar'])->name('calendar');
// END Calendar

// Return
Route::get('return', [App\Http\Controllers\BookingController::class, 'return'])->name('return');
Route::get('return/edit/{invoice}', [App\Http\Controllers\BookingController::class, 'returnEdit'])->name('return.edit');
Route::get('return/update', [App\Http\Controllers\BookingController::class, 'returnUpdate'])->name('return.update');
// END Return