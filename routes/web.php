<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\TiketController;
use App\Http\Controllers\TiketOfflineController;
use App\Http\Controllers\KursiVipController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\StadionController;
use App\Http\Controllers\PertandinganController;
use App\Http\Controllers\DetailPemesananController;
use App\Http\Controllers\PembayaranController;

/*
|--------------------------------------------------------------------------
| ROOT → LOGIN
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return redirect()->route('login');
});

/*
|--------------------------------------------------------------------------
| AUTH (PUBLIC)
|--------------------------------------------------------------------------
*/
Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'registerForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| WAJIB LOGIN
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {

    /*
    |--------------------------------------------------------------------------
    | LANDING (SETELAH LOGIN)
    |--------------------------------------------------------------------------
    */
    Route::get('/landing', [LandingController::class, 'index'])
        ->name('landing');

    /*
    |--------------------------------------------------------------------------
    | TIKET
    |--------------------------------------------------------------------------
    */
    Route::resource('tiket', TiketController::class);

    /*
    |--------------------------------------------------------------------------
    | TIKET OFFLINE
    |--------------------------------------------------------------------------
    */
    Route::get('/tiket-offline', [TiketOfflineController::class, 'index'])->name('tiket.offline.index');

Route::get('/tiket-offline/create/{tiket}', [TiketOfflineController::class, 'create'])->name('tiket.offline.create');

Route::post('/tiket-offline/store', [TiketOfflineController::class, 'store'])->name('tiket.offline.store');

// Route untuk melihat keranjang
Route::get('/tiket-offline/cart', [TiketOfflineController::class, 'cart'])->name('tiket.offline.cart');

// Route untuk menambah tiket ke keranjang
Route::post('/tiket-offline/cart/add', [TiketOfflineController::class, 'addToCart'])->name('tiket.offline.cart.add');

// Route untuk menghapus tiket dari keranjang
Route::post('/tiket-offline/cart/remove', [TiketOfflineController::class, 'removeFromCart'])->name('tiket.offline.cart.remove');

// Route untuk checkout
Route::post('/tiket-offline/checkout', [TiketOfflineController::class, 'checkout'])->name('tiket.offline.checkout');

// Route untuk struk pemesanan offline
Route::get('/tiket-offline/struk/{id}', [TiketOfflineController::class, 'struk'])->name('tiket.offline.struk');

    /*
    |--------------------------------------------------------------------------
    | CRUD ADMIN
    |--------------------------------------------------------------------------
    */
    Route::resource('pengguna', PenggunaController::class);
    Route::resource('stadion', StadionController::class);
    Route::resource('pertandingan', PertandinganController::class);
    Route::resource('detail-pemesanan', DetailPemesananController::class);
    Route::resource('pembayaran', PembayaranController::class);
    Route::resource('kursi-vip', KursiVipController::class);
    Route::get('/tiket-vip/create', [KursiVipController::class, 'create'])->name('tiket-vip.create');

});
