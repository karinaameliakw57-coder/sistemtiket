<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PemesananApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
| Route ini diakses melalui barcode / scanner
| Contoh:
| http://localhost:8000/api/pemesanan/1
|--------------------------------------------------------------------------
*/

Route::get('/pemesanan/{id}', [PemesananApiController::class, 'show']);
