<?php

namespace App\Http\Controllers;

use App\Models\Reservasis;
use App\Models\Jenis_kerusakans;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ReservasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservasis = Reservasis::with(['jenisKerusakan', 'riwayats'])
            ->orderBy('created_at', 'desc')
            ->paginate(10);
            
        return view('reservasis.index', compact('reservasis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jenisKerusakans = Jenis_kerusakans::all();
        return view('reservasis.create', compact('jenisKerusakans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'servis' => 'required|string|max:255',
            'namaLengkap' => 'required|string|max:255',
            'alamatLengkap' => 'required|string',
            'noTelp' => 'required|string|max:16',
            'idJenisKerusakan' => 'required|exists:jenis_kerusakans,id',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:5000',
            'video' => 'nullable|mimes:mp4,mov,avi|max:20000',
            'status' => 'required|string|in:menunggu,diproses,selesai,dibatalkan',
        ]);

        // Generate nomor resi unik
        $validated['noResi'] = 'RSV-' . date('Ymd') . '-' . strtoupper(uniqid());

        // Handle file uploads
        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('reservasi/gambar', 'public');
        }

        if ($request->hasFile('video')) {
            $validated['video'] = $request->file('video')->store('reservasi/video', 'public');
        }

        Reservasis::create($validated);

        return redirect()->route('reservasis.index')
            ->with('success', 'Reservasi berhasil dibuat dengan nomor resi: ' . $validated['noResi']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Reservasis $reservasi)
    {
        return view('reservasis.show', compact('reservasi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservasis $reservasi)
    {
        $jenisKerusakans = Jenis_kerusakans::all();
        return view('reservasis.edit', compact('reservasi', 'jenisKerusakans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reservasis $reservasi)
    {
        $validated = $request->validate([
            'servis' => 'required|string|max:255',
            'namaLengkap' => 'required|string|max:255',
            'alamatLengkap' => 'required|string',
            'noTelp' => 'required|string|max:20',
            'idJenisKerusakan' => 'required|exists:jenis_kerusakans,id',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:5000',
            'video' => 'nullable|mimes:mp4,mov,avi|max:20000',
            'status' => 'required|string|in:menunggu,diproses,selesai,dibatalkan',
        ]);

        // Handle file uploads
        if ($request->hasFile('gambar')) {
            // Delete old image if exists
            if ($reservasi->gambar) {
                Storage::disk('public')->delete($reservasi->gambar);
            }
            $validated['gambar'] = $request->file('gambar')->store('reservasi/gambar', 'public');
        }

        if ($request->hasFile('video')) {
            // Delete old video if exists
            if ($reservasi->video) {
                Storage::disk('public')->delete($reservasi->video);
            }
            $validated['video'] = $request->file('video')->store('reservasi/video', 'public');
        }

        $reservasi->update($validated);

        return redirect()->route('reservasis.index')
            ->with('success', 'Reservasi berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservasis $reservasi)
    {
        // Delete associated files
        if ($reservasi->gambar) {
            Storage::disk('public')->delete($reservasi->gambar);
        }
        if ($reservasi->video) {
            Storage::disk('public')->delete($reservasi->video);
        }

        $reservasi->delete();

        return redirect()->route('reservasis.index')
            ->with('success', 'Reservasi berhasil dihapus');
    }

    /**
     * API Endpoint untuk mendapatkan data reservasi
     */
    public function apiIndex()
    {
        $reservasis = Reservasis::with(['jenisKerusakan', 'riwayats'])
            ->orderBy('created_at', 'desc')
            ->get();
            
        return response()->json($reservasis);
    }

    /**
     * API Endpoint untuk menampilkan detail reservasi
     */
    public function apiShow($id)
    {
        $reservasi = Reservasis::with(['jenisKerusakan', 'riwayats'])
            ->findOrFail($id);
            
        return response()->json($reservasi);
    }
}