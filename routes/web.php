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

Route::get('/', function () {
    return view('welcome');
});



use App\Http\Controllers\MerchantController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;

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

// Rute untuk halaman utama (login)
Route::get('/', [MerchantController::class, 'showLoginForm'])->name('merchant.login.form');

// Rute untuk registrasi dan login merchant
Route::get('merchant/register', [MerchantController::class, 'showRegistrationForm'])->name('merchant.register.form');
Route::post('merchant/register', [MerchantController::class, 'register'])->name('merchant.register');
Route::get('merchant/login', [MerchantController::class, 'showLoginForm'])->name('merchant.login.form');
Route::post('merchant/login', [MerchantController::class, 'login'])->name('merchant.login');

// Rute untuk halaman dashboard dan pengelolaan profil merchant (memerlukan autentikasi)
Route::middleware(['auth'])->group(function () {
    Route::get('merchant/dashboard', [MerchantController::class, 'dashboard'])->name('merchant.dashboard');
    Route::get('merchant/edit-profile', [MerchantController::class, 'editProfile'])->name('merchant.edit-profile');
    Route::post('merchant/update-profile', [MerchantController::class, 'updateProfile'])->name('merchant.update-profile');
    
    // Rute untuk menu
    Route::resource('menu', MenuController::class);

    // Rute untuk order
    Route::get('order', [OrderController::class, 'index'])->name('order.index');
    Route::get('order/{id}', [OrderController::class, 'show'])->name('order.show');
});
