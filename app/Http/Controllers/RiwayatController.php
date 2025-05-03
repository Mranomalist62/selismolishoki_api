<?php

namespace App\Http\Controllers;

use App\Models\Riwayats; // Pastikan untuk mengimpor model Riwayat
use Illuminate\Http\Request;

class RiwayatController extends Controller
{
    public function index()
    {
        $riwayats = Riwayats::all(); // Ambil semua data riwayat
        return view('admin.riwayat.index', compact('riwayats')); // Kirim data ke view
    }

    public function show($id)
    {
        $riwayat = Riwayats::findOrFail($id); // Temukan riwayat berdasarkan ID
        return view('admin.riwayat.show', compact('riwayat')); // Kirim data ke view
    }
}
