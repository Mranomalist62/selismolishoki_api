<?php

namespace App\Http\Controllers;

use App\Models\Jenis_kerusakans;
use App\Models\JenisKerusakan;
use Illuminate\Http\Request;

class JenisKerusakanController extends Controller
{
    public function index()
    {
        $jenisKerusakan = Jenis_kerusakans::all();
        return view('admin.jenis_kerusakan.index', compact('jenisKerusakan'));
    }

    public function create()
    {
        return view('admin.jenis_kerusakan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        Jenis_kerusakans::create($request->all());
        return redirect()->route('jenis_kerusakan.index')->with('success', 'Jenis kerusakan berhasil ditambahkan.');
    }

    public function edit(Jenis_kerusakans $jenisKerusakan)
    {
        return view('admin.jenis_kerusakan.edit', compact('jenisKerusakan'));
    }

    public function update(Request $request, Jenis_kerusakans $jenisKerusakan)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        $jenisKerusakan->update($request->all());
        return redirect()->route('jenis_kerusakan.index')->with('success', 'Jenis kerusakan berhasil diperbarui.');
    }

    public function destroy(Jenis_kerusakans $jenisKerusakan)
    {
        $jenisKerusakan->delete();
        return redirect()->route('jenis_kerusakan.index')->with('success', 'Jenis kerusakan berhasil dihapus.');
    }
}
