<?php

use App\Http\Controllers\homeController;

Route::get('home', [homeController::class, 'index'])->name('home');
Route::get('/', [homeController::class, 'index'])->name('home');

// about us
Route::get('aboutus', function () {
    return view('aboutus');
})->name('aboutus');

//contact
Route::get('contact', function(){
    return view('contact');
})->name('contact');

// page services
use App\Http\Controllers\PelangganController;

// Route untuk home service
Route::get('/servis', [PelangganController::class, 'create'])->name('services.servis');
Route::post('/servis/submit', [PelangganController::class, 'store'])->name('services.submit');

// Route untuk garage service
Route::get('/servisgarage', [PelangganController::class, 'createGarage'])->name('services.servisGarage');
Route::post('/servisgarage/submit', [PelangganController::class, 'storeGarage'])->name('services.submitGarage');

// Route untuk form cek resi
// Route::get('/cek-resi', [PelangganController::class, 'formCekResi'])->name('services.cekResiForm');
// Route::get('/cek-resi/{noResi}', [PelangganController::class, 'cekResi'])->name('services.cekResi');
Route::get('/cek-resi/{noResi}', [PelangganController::class, 'cekResi'])->name('services.cekResi.param');

Route::get('/upload-video', [PelangganController::class, 'showUploadForm'])->name('video.upload.form');

Route::post('/upload-video', [PelangganController::class, 'upload'])->name('video.upload');

// Route untuk form tambah ulasan
Route::get('/tambah-ulasan', [PelangganController::class, 'formTambahUlasan'])->name('services.formTambahUlasan');
Route::post('/tambah-ulasan/submit', [PelangganController::class, 'tambahUlasan'])->name('services.submitUlasan');
