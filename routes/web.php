<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PelangganController;

Route::get('/', function () {
    return view('welcome');
});
