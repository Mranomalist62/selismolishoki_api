<?php

namespace App\Http\Controllers;

use App\Models\Data_Pelanggan;
use App\Models\ulasan; // Make sure to import your Ulasan model
use App\Models\Reservasi;
use Illuminate\Http\Request;

// class DashboardController extends Controller
// {
//     public function index()
//     {
//         // Fetch data for the dashboard
//         $totalReservasi = Reservasi::count();
//         $homeServiceReservasi = Reservasi::where('servis', 'Home Service')->count();
//         $bengkelReservasi = Reservasi::where('servis', 'Garage Service')->count();
//         $averageRating = ulasan::avg('rating'); // Get average rating from ulasans
//         $totalPelanggan = Data_Pelanggan::count();

//         return view('admin.dashboard', compact('totalReservasi', 'homeServiceReservasi', 'bengkelReservasi', 'averageRating', 'totalPelanggan'));
//     }
// }
