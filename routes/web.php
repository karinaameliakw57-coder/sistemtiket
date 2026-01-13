<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PublicTiketController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\StadionController;
use App\Http\Controllers\PertandinganController;
use App\Http\Controllers\TiketController;
use App\Http\Controllers\DetailPemesananController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\KursiVipController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\TiketOfflineController;

/*
|--------------------------------------------------------------------------
| LANDING PAGE
|--------------------------------------------------------------------------
*/

Route::get('/', [LandingController::class, 'index'])->name('landing');

/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/
Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'registerForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| ADMIN (WAJIB LOGIN)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | TIKET VIP
    |--------------------------------------------------------------------------
    */
    Route::get('/tiket/vip/create', [TiketController::class, 'createVip'])
        ->name('tiket.vip.create');

    Route::post('/tiket/vip/store', [TiketController::class, 'storeVip'])
        ->name('tiket.vip.store');

    Route::get('/tiket/vip/{pertandingan}', [TiketController::class, 'halamanVip'])
        ->name('tiket.vip.halaman');

    Route::post('/tiket/vip/beli', [KursiVipController::class, 'beli'])
        ->name('tiket.vip.beli');

    /*
    |--------------------------------------------------------------------------
    | TIKET OFFLINE + CART (WAJIB URUTAN INI)
    |--------------------------------------------------------------------------
    */
    Route::get('/tiket-offline', [TiketOfflineController::class, 'index'])
        ->name('tiket.offline.index');

    Route::get('/tiket-offline/cart', [TiketOfflineController::class, 'cart'])
        ->name('tiket.offline.cart');

    Route::post('/tiket-offline/cart/add', [TiketOfflineController::class, 'addToCart'])
        ->name('tiket.offline.cart.add');

    Route::post('/tiket-offline/checkout', [TiketOfflineController::class, 'checkout'])
        ->name('tiket.offline.checkout');

    Route::get('/tiket-offline/{tiket}', [TiketOfflineController::class, 'create'])
        ->name('tiket.offline.create');

    Route::post('/tiket-offline', [TiketOfflineController::class, 'store'])
        ->name('tiket.offline.store');
    Route::post(
        '/tiket-offline/cart/remove',
        [TiketOfflineController::class, 'removeFromCart']
    )->name('tiket.offline.cart.remove');


    /*
    |--------------------------------------------------------------------------
    | CRUD ADMIN
    |--------------------------------------------------------------------------
    */
    Route::resource('pengguna', PenggunaController::class);
    Route::resource('stadion', StadionController::class);
    Route::resource('pertandingan', PertandinganController::class);
    Route::resource('tiket', TiketController::class);
    Route::resource('pemesanan', PemesananController::class);
    Route::resource('detail-pemesanan', DetailPemesananController::class);
    Route::resource('pembayaran', PembayaranController::class);
    Route::resource('kursi-vip', KursiVipController::class);
});
