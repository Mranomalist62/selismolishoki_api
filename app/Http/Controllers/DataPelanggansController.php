<?php

namespace App\Http\Controllers;

use App\Models\Data_Pelanggans;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DataPelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataPelanggans = Data_Pelanggans::orderBy('created_at', 'desc')
            ->paginate(10);
            
        return view('data_pelanggans.index', compact('dataPelanggans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('data_pelanggans.create');
    }

    /**
     * Store a newly created resource in storage
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'noHP' => 'required|string|max:16',
            'alamat' => 'required|string',
            'keluhan' => 'required|string',
        ]);

        // Generate kode unik
        $validated['kode'] = 'PLG-' . date('Ymd') . '-' . Str::upper(Str::random(4));

        Data_Pelanggans::create($validated);

        return redirect()->route('data-pelanggans.index')
            ->with('success', 'Data pelanggan berhasil dibuat dengan kode: ' . $validated['kode']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Data_Pelanggans $data_pelanggan)
    {
        return view('data_pelanggans.show', compact('data_pelanggan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Data_Pelanggans $data_pelanggan)
    {
        return view('data_pelanggans.edit', compact('data_pelanggan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Data_Pelanggans $data_pelanggan)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'noHP' => 'required|string|max:16',
            'alamat' => 'required|string',
            'keluhan' => 'required|string',
        ]);

        $data_pelanggan->update($validated);

        return redirect()->route('data-pelanggans.index')
            ->with('success', 'Data pelanggan berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Data_Pelanggans $data_pelanggan)
    {
        $data_pelanggan->delete();

        return redirect()->route('data-pelanggans.index')
            ->with('success', 'Data pelanggan berhasil dihapus');
    }

    /**
     * API Endpoint untuk mendapatkan semua data pelanggan
     */
    public function apiIndex()
    {
        $dataPelanggans = Data_Pelanggans::orderBy('created_at', 'desc')
            ->get();
            
        return response()->json($dataPelanggans);
    }

    /**
     * API Endpoint untuk menampilkan detail pelanggan
     */
    public function apiShow($id)
    {
        $dataPelanggan = Data_Pelanggans::findOrFail($id);
            
        return response()->json($dataPelanggan);
    }

    /**
     * API Endpoint untuk mencari pelanggan berdasarkan nama atau noHP
     */
    public function apiSearch(Request $request)
    {
        $query = $request->input('query');
        
        $results = Data_Pelanggans::where('nama', 'like', "%$query%")
            ->orWhere('noHP', 'like', "%$query%")
            ->get();
            
        return response()->json($results);
    }
}