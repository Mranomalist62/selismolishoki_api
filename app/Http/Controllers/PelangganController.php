<?php

namespace App\Http\Controllers;

use App\Models\Data_Pelanggan;
use Illuminate\Http\Request;
use App\Models\Jadwal;
use App\Models\Jenis_kerusakan;
use App\Models\Req_jadwal;
use App\Models\Reservasi;
use App\Models\Riwayat;
use App\Models\Ulasan;
use Illuminate\Support\Facades\Storage;

class PelangganController extends Controller
{
    // Menampilkan form reservasi untuk Home Service
    public function create()
    {
        $jenisKerusakan = Jenis_kerusakan::all();
        return view('services.servis', compact('jenisKerusakan'));
    }

    public function store(Request $request)
    {
        // Validasi input dengan tambahan latitude dan longitude
        $validatedData = $request->validate([
            'namaLengkap' => 'required|string|max:255',
            'noTelp' => 'required|string|max:15',
            'alamatLengkap' => 'required|string',
            'idJenisKerusakan' => 'required|integer|exists:jenis_kerusakans,id',
            'deskripsi' => 'required|string',
            'gambar' => 'required|image|mimes:jpeg,png,jpg',
            'video' => 'nullable|file|mimes:mp4,mov,avi',
            'tanggal' => 'required|date',
            'waktuMulai' => 'required|date_format:H:i',
            'waktuSelesai' => 'required|date_format:H:i|after:waktuMulai',
            'latitude' => 'required|numeric|between:-90,90', // Tambahan untuk home service
            'longitude' => 'required|numeric|between:-180,180', // Tambahan untuk home service
        ]);

        // Menyimpan gambar kerusakan
        $imagePath = $request->file('gambar')->store('images/damage', 'public');

        // Menyimpan video kerusakan (jika ada)
        $videoPath = $request->hasFile('video') ? $request->file('video')->store('videos/damage', 'public') : null;

        // Membuat reservasi baru untuk Home Service
        $reservasi = new Reservasi();
        $reservasi->servis = 'Home Service';
        $reservasi->namaLengkap = $validatedData['namaLengkap'];
        $reservasi->noTelp = $validatedData['noTelp'];
        $reservasi->alamatLengkap = $validatedData['alamatLengkap'];
        $reservasi->idJenisKerusakan = $validatedData['idJenisKerusakan'];
        $reservasi->deskripsi = $validatedData['deskripsi'];
        $reservasi->gambar = $imagePath;
        $reservasi->video = $videoPath;
        $reservasi->status = 'pending';
        $reservasi->noResi = 'HM-' . now()->format('ymd') . strtoupper(substr(uniqid(), -2));
        $reservasi->save();

        // Cek dan update/create data pelanggan dengan tambahan koordinat
        $pelanggan = Data_Pelanggan::updateOrCreate(
            ['noHP' => $request->noTelp],
            [
                'nama' => $request->namaLengkap,
                'noHP' => $request->noTelp,
                'alamat' => $request->alamatLengkap,
                'keluhan' => $request->deskripsi,
                'latitude' => $validatedData['latitude'],
                'longitude' => $validatedData['longitude'],
                'jenis_layanan' => 'home_service'
            ]
        );

        // Buat riwayat untuk reservasi
        Riwayat::create([
            'idReservasi' => $reservasi->id,
            'status' => $reservasi->status,
        ]);

        // Tambahkan Request Jadwal
        $this->tambahRequestJadwal(new Request([
            'idReservasi' => $reservasi->id,
            'tanggal' => $validatedData['tanggal'],
            'waktuMulai' => $validatedData['waktuMulai'],
            'waktuSelesai' => $validatedData['waktuSelesai'],
        ]));

        return response()->json([
            'success' => true,
            'message' => 'Reservasi berhasil dibuat!',
            'no_resi' => $reservasi->noResi,
        ]);
    }

    public function storeGarage(Request $request)
    {
        // Validasi input (tanpa latitude dan longitude untuk garage service)
        $validatedData = $request->validate([
            'namaLengkap' => 'required|string|max:255',
            'noTelp' => 'required|string|max:15',
            'alamatLengkap' => 'required|string',
            'idJenisKerusakan' => 'required|integer|exists:jenis_kerusakans,id',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg',
            'video' => 'nullable|file|mimes:mp4,mov,avi',
            'tanggal' => 'required|date',
            'waktuMulai' => 'required|date_format:H:i',
            'waktuSelesai' => 'required|date_format:H:i|after:waktuMulai',
        ]);

        // Inisialisasi variabel untuk menyimpan gambar dan video
        $imagePath = $request->hasFile('gambar') ? $request->file('gambar')->store('images/damage', 'public') : null;
        $videoPath = $request->hasFile('video') ? $request->file('video')->store('videos/damage', 'public') : null;

        // Membuat reservasi baru untuk Garage Service
        $reservasi = new Reservasi();
        $reservasi->servis = 'Garage Service';
        $reservasi->namaLengkap = $validatedData['namaLengkap'];
        $reservasi->noTelp = $validatedData['noTelp'];
        $reservasi->alamatLengkap = $validatedData['alamatLengkap'];
        $reservasi->idJenisKerusakan = $validatedData['idJenisKerusakan'];
        $reservasi->deskripsi = $validatedData['deskripsi'];
        $reservasi->gambar = $imagePath;
        $reservasi->video = $videoPath;
        $reservasi->status = 'pending';
        $reservasi->noResi = 'GR-' . now()->format('ymd') . strtoupper(substr(uniqid(), -2));
        $reservasi->save();

        // Cek dan update/create data pelanggan (tanpa koordinat untuk garage service)
        $pelanggan = Data_Pelanggan::updateOrCreate(
            ['noHP' => $request->noTelp],
            [
                'nama' => $request->namaLengkap,
                'noHP' => $request->noTelp,
                'alamat' => $request->alamatLengkap,
                'keluhan' => $request->deskripsi,
                'jenis_layanan' => 'bengkel'
            ]
        );

        // Buat riwayat untuk reservasi
        Riwayat::create([
            'idReservasi' => $reservasi->id,
            'status' => $reservasi->status,
        ]);

        // Tambahkan Request Jadwal
        $this->tambahRequestJadwal(new Request([
            'idReservasi' => $reservasi->id,
            'tanggal' => $validatedData['tanggal'],
            'waktuMulai' => $validatedData['waktuMulai'],
            'waktuSelesai' => $validatedData['waktuSelesai'],
        ]));

        return response()->json([
            'success' => true,
            'message' => 'Reservasi berhasil dibuat!',
            'no_resi' => $reservasi->noResi,
        ]);
    }

    // Menampilkan form reservasi untuk Garage Service
    public function createGarage()
    {
        $jenisKerusakan = Jenis_kerusakan::all();
        return view('services.servisgarage', compact('jenisKerusakan'));
    }

    public function formCekResi()
    {
        return view('services.cekresi');
    }

    public function cekResi($noResi)
    {
        $reservasi = Reservasi::where('noResi', $noResi)->first();

        if (!$reservasi) {
            return response()->json([
                'success' => false,
                'message' => 'Nomor resi tidak ditemukan.'
            ]);
        }

        $riwayat = Riwayat::where('idReservasi', $reservasi->id)->orderBy('created_at', 'desc')->get();
        $jadwal = ($reservasi->status == 'confirmed') ? Jadwal::where('idReservasi', $reservasi->id)->first() : null;

        $statusMapping = [
            'pending' => 'Menunggu Konfirmasi',
            'confirmed' => 'Sudah Konfirmasi',
            'process' => 'Proses Perbaikan',
            'completed' => 'Selesai',
            'cancelled' => 'Dibatalkan',
        ];

        return response()->json([
            'success' => true,
            'data' => [
                'namaLengkap' => $reservasi->namaLengkap,
                'noTelp' => $reservasi->noTelp,
                'servis' => $reservasi->servis,
                'deskripsi' => $reservasi->deskripsi,
                'status' => $statusMapping[$reservasi->status] ?? $reservasi->status,
                'riwayat' => $riwayat,
                'jadwal' => $jadwal ? [
                    'tanggal' => $jadwal->tanggal,
                    'waktuMulai' => $jadwal->waktuMulai,
                    'waktuSelesai' => $jadwal->waktuSelesai,
                ] : null,
                'lokasi' => ($reservasi->servis == 'Home Service') ? [
                    'latitude' => $reservasi->pelanggan->latitude,
                    'longitude' => $reservasi->pelanggan->longitude,
                    'alamat' => $reservasi->alamatLengkap
                ] : null
            ]
        ]);
    }

    public function showUploadForm()
    {
        return view('services.upload_video');
    }

    public function upload(Request $request)
    {
        $request->validate([
            'video' => 'required|file|mimes:mp4,mov,avi',
            'no_resi' => 'required|string',
        ]);

        $reservasi = Reservasi::where('noResi', $request->input('no_resi'))->first();

        if (!$reservasi) {
            return response()->json([
                'success' => false,
                'message' => 'Reservasi tidak ditemukan.',
            ]);
        }

        $videoPath = $request->file('video')->store('videos/damage', 'public');
        $reservasi->video = $videoPath;
        $reservasi->save();

        return response()->json([
            'success' => true,
            'message' => 'Video berhasil diupload!',
        ]);
    }

    public function formTambahUlasan()
    {
        return view('services.tambahulasan');
    }

    public function tambahUlasan(Request $request)
    {
        $validatedData = $request->validate([
            'noResi' => 'required|string|exists:reservasis,noResi',
            'noTelp' => 'required|string',
            'ulasan' => 'required|string|max:1000',
            'rating' => 'required|integer|between:1,5',
        ]);

        $reservasi = Reservasi::where('noResi', $validatedData['noResi'])
            ->where('noTelp', $validatedData['noTelp'])
            ->first();

        if (!$reservasi) {
            return response()->json([
                'success' => false,
                'message' => 'Nomor resi dan nomor telepon tidak cocok.'
            ]);
        }

        Ulasan::create([
            'nama' => $reservasi->namaLengkap,
            'ulasan' => $validatedData['ulasan'],
            'rating' => $validatedData['rating'],
            'id_pelanggan' => $reservasi->pelanggan->id // Tambahkan relasi ke pelanggan
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Ulasan berhasil disimpan.'
        ]);
    }

    public function tambahRequestJadwal(Request $request)
    {
        $validatedData = $request->validate([
            'idReservasi' => 'required|exists:reservasis,id',
            'tanggal' => 'required|date',
            'waktuMulai' => 'required|date_format:H:i',
            'waktuSelesai' => 'required|date_format:H:i|after:waktuMulai',
        ]);

        $jadwal = Req_jadwal::create($validatedData);

        return response()->json([
            'success' => true,
            'message' => 'Request jadwal berhasil ditambahkan.',
            'data' => $jadwal,
        ]);
    }

    // API Endpoint untuk mendapatkan pelanggan home service dengan lokasi
    public function apiHomeService()
    {
        $homeServices = Data_Pelanggan::with(['reservasi' => function ($query) {
            $query->where('servis', 'Home Service')
                ->where('status', '!=', 'cancelled');
        }])
            ->where('jenis_layanan', 'home_service')
            ->whereNotNull('latitude')
            ->whereNotNull('longitude')
            ->get();

        return response()->json($homeServices);
    }

    // API Endpoint untuk mencari pelanggan home service dalam radius tertentu
    public function apiNearbyHomeService(Request $request)
    {
        $request->validate([
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'radius' => 'required|numeric' // dalam kilometer
        ]);

        $latitude = $request->latitude;
        $longitude = $request->longitude;
        $radius = $request->radius;

        $homeServices = Data_Pelanggan::where('jenis_layanan', 'home_service')
            ->selectRaw(
                "*,
                (6371 * acos(cos(radians(?)) * cos(radians(latitude)) * cos(radians(longitude) - radians(?)) + sin(radians(?)) * sin(radians(latitude)))) AS distance",
                [$latitude, $longitude, $latitude]
            )
            ->having('distance', '<', $radius)
            ->orderBy('distance')
            ->with(['reservasi' => function ($query) {
                $query->where('status', '!=', 'cancelled');
            }])
            ->get();

        return response()->json($homeServices);
    }
}
