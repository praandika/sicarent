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
/** END Landing Page */

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
    // Create
    Route::post('/store', [App\Http\Controllers\UserController::class, 'store'])->name('user.store');
    /**Edit */
    Route::get('/edit/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('user.edit');
    // Update
    Route::post('/update', [App\Http\Controllers\UserController::class, 'update'])->name('user.update');
    /**Change Password Admin */
    Route::post('adminpass', [App\Http\Controllers\UserController::class, 'adminpass'])->name('admin.password');
});
/** END Manage Data User */