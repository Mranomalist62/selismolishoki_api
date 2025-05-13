<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\JenisKerusakanController;
use App\Http\Controllers\UlasanController;

Route::prefix('reservasi')->controller(PelangganController::class)->group(function () {
    Route::post('/home', 'store');            // POST /api/reservasi/home
    Route::post('/garage', 'storeGarage');    // POST /api/reservasi/garage
    Route::get('/checkresi', 'cekResi');      // GET  /api/reservasi/checkresi
});

Route::prefix('jenis-kerusakan')->controller(JenisKerusakanController::class)->group(function () {
    Route::get('/list', 'getJenisKerusakanList'); // GET /api/jenis-kerusakan/list
});

Route::prefix('/ulasan')->controller( UlasanController::class)->group(function () {
    Route::post('/add', 'store'); // POST /api/ulasan/add
    Route::get('/', 'index'); //GET /api/ulasan/fetch
});