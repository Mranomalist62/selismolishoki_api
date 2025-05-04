<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PelangganController;

Route::get('/', function () {
    return view('welcome');
});


Route::controller(PelangganController::class)->group(function () {
    // Home Service reservation
    Route::post('/reservasi/home', 'store');

    // Garage Service reservation
    Route::post('/reservasi/garage', 'storeGarage');

    // Check Resi
    Route::get('/reservasi/checkresi','cekResi');
});