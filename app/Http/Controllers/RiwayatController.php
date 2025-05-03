<?php

namespace App\Http\Controllers;

use App\Models\Riwayat; // Pastikan untuk mengimpor model Riwayat
use Illuminate\Http\Request;

class RiwayatController extends Controller
{
    public function index()
    {
        $riwayats = Riwayat::all(); // Ambil semua data riwayat
        return view('admin.riwayat.index', compact('riwayats')); // Kirim data ke view
    }

    public function show($id)
    {
        $riwayat = Riwayat::findOrFail($id); // Temukan riwayat berdasarkan ID
        return view('admin.riwayat.show', compact('riwayats')); // Kirim data ke view
    }
}
