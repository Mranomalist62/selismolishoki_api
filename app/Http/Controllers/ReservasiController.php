<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservasi;
use App\Models\JenisKerusakan;
use App\Models\Riwayat;
use App\Models\Data_pelanggan;
use App\Models\Req_jadwals;

class ReservasiController extends Controller
{
    public function index(Request $request)
    {
        // Menerima input pencarian dan filter
        $searchResi = $request->input('searchResi');
        $searchNama = $request->input('searchNama');
        $filterJenisKerusakan = $request->input('jenisKerusakan');

        // Query untuk reservasi yang belum 'completed'
        $reservasis = Reservasi::with(['jenisKerusakan', 'reqJadwals']) // Tambahkan relasi reqJadwals
            ->where('status', '!=', 'completed')
            ->when($searchResi, function ($query, $searchResi) {
                return $query->where('noResi', 'like', "%{$searchResi}%");
            })
            ->when($searchNama, function ($query, $searchNama) {
                return $query->where('namaLengkap', 'like', "%{$searchNama}%");
            })
            ->when($filterJenisKerusakan, function ($query, $filterJenisKerusakan) {
                return $query->where('idJenisKerusakan', $filterJenisKerusakan);
            })
            ->paginate(10);

        $jenisKerusakan = jenis_kerusakan::all();

        return view('admin.reservasi.index', compact('reservasis', 'jenisKerusakan'));
    }

    public function history(Request $request)
    {
        // Menerima input pencarian dan filter
        $searchResi = $request->input('searchResi');
        $searchNama = $request->input('searchNama');
        $searchKodePelanggan = $request->input('kodePelanggan');
        $filterJenisKerusakan = $request->input('jenisKerusakan');

        // Query awal untuk reservasi yang sudah 'completed'
        $reservasiQuery = Reservasi::with('jenisKerusakan')
            ->where('status', 'completed')
            ->when($searchResi, function ($query, $searchResi) {
                return $query->where('noResi', 'like', "%{$searchResi}%");
            })
            ->when($searchNama, function ($query, $searchNama) {
                return $query->where('namaLengkap', 'like', "%{$searchNama}%");
            })
            ->when($filterJenisKerusakan, function ($query, $filterJenisKerusakan) {
                return $query->where('idJenisKerusakan', $filterJenisKerusakan);
            })
            ->when($searchKodePelanggan, function ($query, $searchKodePelanggan) {
                // Lakukan join dengan tabel data_pelanggan untuk mengakses kolom noTelp
                $query->join('data_pelanggans', 'reservasis.noTelp', '=', 'data_pelanggans.noHP')
                      ->where('data_pelanggans.kode', $searchKodePelanggan);
            })
            // Mengurutkan berdasarkan created_at dari tabel reservasis
            ->orderBy('reservasis.created_at', 'desc');

        // Dapatkan hasil paginasi
        $reservasis = $reservasiQuery->paginate(10);

        // Dapatkan semua jenis kerusakan untuk dropdown filter
        $jenisKerusakan = jenis_kerusakan::all();

        return view('admin.reservasi.done', compact('reservasis', 'jenisKerusakan'));
    }




    // Menampilkan form untuk menambahkan reservasi baru
    public function create()
    {
        $jenisKerusakan = jenis_kerusakan::all(); // Ambil data jenis kerusakan

        return view('admin.reservasi.create', compact('jenisKerusakan'));
    }

    // Menyimpan reservasi baru
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'namaLengkap' => 'required|string|max:255',
            'alamatLengkap' => 'required|string',
            'noTelp' => 'required|string|max:15',
            'idJenisKerusakan' => 'required|exists:jenis_kerusakans,id',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|string',
            'video' => 'nullable|string',
            'noResi' => 'required|unique:reservasis',
            'servis' => 'required|string',
            'status' => 'nullable|string|in:pending,confirmed,process,completed,cancelled', // Status menjadi nullable
            'latitude' => 'required|numeric|between:-90,90', // Tambahan untuk home service
            'longitude' => 'required|numeric|between:-180,180', // Tambahan untuk home service
        ]);

        // Cek apakah pelanggan sudah ada berdasarkan noTelp
        $pelanggan = Data_pelanggan::where('noHP', $request->noTelp)->first();

        // Jika pelanggan tidak ada, buat pelanggan baru
        if (!$pelanggan) {
            $pelanggan = Data_pelanggan::create([
                'nama' => $request->namaLengkap,
                'noHP' => $request->noTelp,
                'alamat' => $request->alamatLengkap,
                'longitude' => $request->longitude,
                'latitude' => $request->latitude,
            ]);
        } else {
            // Jika pelanggan sudah ada, Anda bisa memperbarui data jika perlu
            $pelanggan->update([
                'nama' => $request->namaLengkap,
                'noHP' => $request->noTelp,
                'alamat' => $request->alamatLengkap,
                'longitude' => $request->longitude,
                'latitude' => $request->latitude,
            ]);
        }

        // Simpan data reservasi
        $reservasi = Reservasi::create(array_merge($validatedData, ['idPelanggan' => $pelanggan->id]));

        // Simpan riwayat hanya jika status diberikan
        if (!is_null($reservasi->status)) {
            Riwayat::create([
                'idReservasi' => $reservasi->id,
                'status' => $reservasi->status,
            ]);
        }

        return redirect()->route('reservasi.index')->with('success', 'Reservasi berhasil ditambahkan.');
    }


    // Menampilkan form untuk mengedit reservasi
    public function edit($id)
    {
        $reservasi = Reservasi::findOrFail($id);
        $jenisKerusakan = jenis_kerusakan::all();

        return view('admin.reservasi.edit', compact('reservasi', 'jenisKerusakan'));
    }

    // Memperbarui reservasi
    public function update(Request $request, $id)
    {
        $reservasi = Reservasi::findOrFail($id);

        $validatedData = $request->validate([
            'namaLengkap' => 'nullable|string|max:255', // Nullable
            'alamatLengkap' => 'nullable|string', // Nullable
            'noTelp' => 'nullable|string|max:15', // Nullable
            'idJenisKerusakan' => 'nullable|exists:jenis_kerusakans,id', // Nullable
            'deskripsi' => 'nullable|string', // Nullable
            'gambar' => 'nullable|string', // Tetap nullable
            'video' => 'nullable|string', // Tetap nullable
            'noResi' => 'nullable|unique:reservasis,noResi,' . $reservasi->id, // Nullable
            'servis' => 'nullable|string', // Nullable
            'status' => 'nullable|string|in:pending,confirmed,process,completed,cancelled', // Tetap nullable
            'latitude' => 'required|numeric|between:-90,90', // Tambahan untuk home service
            'longitude' => 'required|numeric|between:-180,180', // Tambahan untuk home service
        ]);

        // Update data reservasi
        $reservasi->update($validatedData);

        // Simpan riwayat hanya jika status diberikan
        if (!is_null($reservasi->status)) {
            Riwayat::create([
                'idReservasi' => $reservasi->id,
                'status' => $reservasi->status,
            ]);
        }

        return redirect()->route('reservasi.index')->with('success', 'Reservasi berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $reservasi = Reservasi::findOrFail($id);

        // Hapus data terkait di req_jadwals
        $reservasi->reqJadwals()->delete();

        // Hapus data di reservasi
        $reservasi->delete();

        return redirect()->route('reservasi.index')->with('success', 'Reservasi berhasil dihapus.');
    }

    // Menampilkan detail reservasi dan riwayatnya
    public function show($id)
    {
        // Mengambil data reservasi berdasarkan ID, beserta jenis kerusakan dan riwayat
        $reservasi = Reservasi::with('jenisKerusakan')->findOrFail($id);
        $riwayats = Riwayat::where('idReservasi', $id)->get(); // Mengambil data riwayat terkait

        return view('admin.reservasi.show', compact('reservasi', 'riwayats'));
    }

    // Fungsi untuk mengubah status reservasi
    public function updateStatus(Request $request, $id)
    {
        $reservasi = Reservasi::findOrFail($id);

        // Validasi input status
        $validatedData = $request->validate([
            'status' => 'required|string|in:pending,confirmed,process,completed,cancelled',
        ]);

        if ($validatedData['status'] == 'confirmed') {
            // Redirect ke halaman tambah jadwal dengan idReservasi disertakan
            return redirect()->route('jadwal.create', ['idReservasi' => $reservasi->id]);
        }

         // Jika status berubah menjadi 'completed', hapus semua jadwal terkait
        if ($validatedData['status'] == 'completed') {
            // Cek apakah ada jadwal terkait dan hapus semuanya
            $jadwals = $reservasi->jadwals; // Menggunakan relasi hasMany
            if ($jadwals->isNotEmpty()) {
                foreach ($jadwals as $jadwal) {
                    $jadwal->delete(); // Menghapus setiap jadwal terkait
                }
            }
            $reqJadwals = $reservasi->reqJadwals;
            if ($reqJadwals->isNotEmpty()) {
                foreach ($reqJadwals as $reqJadwal) {
                    $reqJadwal->delete(); // Menghapus setiap reqJadwal terkait
                }
            }
        }

        // Update status reservasi
        $reservasi->update(['status' => $validatedData['status']]);

        // Simpan perubahan status ke riwayat
        Riwayat::create([
            'idReservasi' => $reservasi->id,
            'status' => $reservasi->status,
        ]);

        return redirect()->route('reservasi.index')->with('success', 'Status reservasi berhasil diperbarui.');
    }

}
