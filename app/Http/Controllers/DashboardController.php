<?php

namespace App\Http\Controllers;

use App\Models\Data_Pelanggans;
use App\Models\Ulasans; // Make sure to import your Ulasan model
use App\Models\Reservasis;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Fetch data for the dashboard
        $totalReservasi = Reservasis::count();
        $homeServiceReservasi = Reservasis::where('servis', 'Home Service')->count();
        $bengkelReservasi = Reservasis::where('servis', 'Garage Service')->count();
        $averageRating = Ulasans::avg('rating'); // Get average rating from ulasans
        $totalPelanggan = Data_Pelanggans::count();

        return view('admin.dashboard', compact('totalReservasi', 'homeServiceReservasi', 'bengkelReservasi', 'averageRating', 'totalPelanggan'));
    }
}
