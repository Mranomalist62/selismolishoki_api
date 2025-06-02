<?php

namespace App\Http\Controllers;

use App\Models\Data_Pelanggan;
use Illuminate\Http\Request;
use App\Models\Jadwal;
use App\Models\JenisKerusakan;
use App\Models\Req_jadwal;
use App\Models\Reservasi;
use App\Models\Riwayat;
use App\Models\ulasan;
use Illuminate\Support\Facades\Log;

class PelangganController extends Controller
{
    // Menampilkan form reservasi untuk Home Service
    public function create()
    {
        $jenisKerusakan = JenisKerusakan::all();
        return view('services.servis', compact('jenisKerusakan'));
    }

    public function store(Request $request)
    {
        $isApi = $request->wantsJson() || $request->is('api/*');

        try {
            // Validasi input
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
                'latitude' => 'required|numeric|between:-90,90',
                'longitude' => 'required|numeric|between:-180,180',
            ]);

            // Simpan file gambar
            $imagePath = $request->hasFile('gambar')
                ? $request->file('gambar')->store('images/damage', 'public')
                : null;

            // Simpan file video jika ada
            $videoPath = $request->hasFile('video')
                ? $request->file('video')->store('videos/damage', 'public')
                : null;

            // Buat reservasi
            $reservasi = new Reservasi();
            $reservasi->fill([
                'servis' => 'Home Service',
                'namaLengkap' => $validatedData['namaLengkap'],
                'noTelp' => $validatedData['noTelp'],
                'alamatLengkap' => $validatedData['alamatLengkap'],
                'idJenisKerusakan' => $validatedData['idJenisKerusakan'],
                'deskripsi' => $validatedData['deskripsi'],
                'latitude' => $validatedData['latitude'],
                'longitude' => $validatedData['longitude'],
                'gambar' => $imagePath,
                'video' => $videoPath,
                'status' => 'pending',
                'noResi' => 'HM-' . now()->format('ymd') . strtoupper(substr(uniqid(), -2)),
            ]);
            $reservasi->save();

            // Simpan atau update data pelanggan
            Data_Pelanggan::updateOrCreate(
                ['noHP' => $request->noTelp],
                [
                    'nama' => $validatedData['namaLengkap'],
                    'alamat' => $validatedData['alamatLengkap'],
                    'keluhan' => $validatedData['deskripsi']
                ]
            );

            // Simpan riwayat
            Riwayat::create([
                'idReservasi' => $reservasi->id,
                'status' => $reservasi->status,
            ]);

            // Tambah request jadwal
            $this->tambahRequestJadwal(new Request([
                'idReservasi' => $reservasi->id,
                'tanggal' => $validatedData['tanggal'],
                'waktuMulai' => $validatedData['waktuMulai'],
                'waktuSelesai' => $validatedData['waktuSelesai'],
            ]));

            if ($isApi) {
                return response()->json([
                    'status' => 'success',
                    'message' => 'Reservasi berhasil dibuat.',
                    'data' => [
                        'no_resi' => $reservasi->noResi,
                        'reservasi_id' => $reservasi->id
                    ]
                ], 201);
            }

            return response()->json([
                'success' => true,
                'message' => 'Reservasi berhasil dibuat!',
                'no_resi' => $reservasi->noResi,
            ]);

        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('Validasi gagal: ' . $e);

            if ($isApi) {
                return response()->json([
                    'status' => 'fail',
                    'message' => 'Validasi gagal.',
                    'errors' => $e->errors()
                ], 422);
            }

            return back()->withErrors($e->validator)->withInput();

        } catch (\Exception $e) {
            Log::error('Terjadi kesalahan: ' . $e);

            if ($isApi) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Terjadi kesalahan internal.',
                    'error' => config('app.debug') ? $e->getMessage() : null
                ], 500);
            }

            return back()->with('error', 'Terjadi kesalahan internal.')->withInput();
        }
    }


    public function storeGarage(Request $request)
    {
        $isApi = $request->wantsJson() || $request->is('api/*');

        try {
            // Validasi input
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

            // Simpan file jika ada
            $imagePath = $request->hasFile('gambar') ? $request->file('gambar')->store('images/damage', 'public') : null;
            $videoPath = $request->hasFile('video') ? $request->file('video')->store('videos/damage', 'public') : null;

            // Buat reservasi baru
            $reservasi = new Reservasi();
            $reservasi->fill([
                'servis' => 'Garage Service',
                'namaLengkap' => $validatedData['namaLengkap'],
                'noTelp' => $validatedData['noTelp'],
                'alamatLengkap' => $validatedData['alamatLengkap'],
                'idJenisKerusakan' => $validatedData['idJenisKerusakan'],
                'deskripsi' => $validatedData['deskripsi'],
                'gambar' => $imagePath,
                'video' => $videoPath,
                'status' => 'pending',
                'noResi' => 'GR-' . now()->format('ymd') . strtoupper(substr(uniqid(), -2)),
            ]);
            $reservasi->save();

            // Simpan atau update data pelanggan
            Data_Pelanggan::updateOrCreate(
                ['noHP' => $request->noTelp],
                [
                    'nama' => $validatedData['namaLengkap'],
                    'alamat' => $validatedData['alamatLengkap'],
                    'keluhan' => $validatedData['deskripsi']
                ]
            );

            // Simpan riwayat
            Riwayat::create([
                'idReservasi' => $reservasi->id,
                'status' => $reservasi->status,
            ]);

            // Tambah request jadwal
            $this->tambahRequestJadwal(new Request([
                'idReservasi' => $reservasi->id,
                'tanggal' => $validatedData['tanggal'],
                'waktuMulai' => $validatedData['waktuMulai'],
                'waktuSelesai' => $validatedData['waktuSelesai'],
            ]));

            if ($isApi) {
                return response()->json([
                    'status' => 'success',
                    'message' => 'Reservasi Garage berhasil dibuat.',
                    'data' => [
                        'no_resi' => $reservasi->noResi,
                        'reservasi_id' => $reservasi->id
                    ]
                ], 201);
            }

            return response()->json([
                'success' => true,
                'message' => 'Reservasi berhasil dibuat!',
                'no_resi' => $reservasi->noResi,
            ]);

        } catch (\Illuminate\Validation\ValidationException $e) {
            if ($isApi) {
                return response()->json([
                    'status' => 'fail',
                    'message' => 'Validasi gagal.',
                    'errors' => $e->errors()
                ], 422);
            }

            return back()->withErrors($e->validator)->withInput();

        } catch (\Exception $e) {
            if ($isApi) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Terjadi kesalahan saat membuat reservasi Garage.',
                    'error' => config('app.debug') ? $e->getMessage() : null
                ], 500);
            }

            return back()->with('error', 'Terjadi kesalahan saat membuat reservasi Garage.')->withInput();
        }
    }

    // // Menampilkan form reservasi untuk Garage Service
    public function createGarage()
    {
        $jenisKerusakan = JenisKerusakan::all();
        return view('services.servisgarage', compact('jenisKerusakan'));
    }

    // public function formCekResi()
    // {
    //     return view('services.cekresi');
    // }

    public function cekResi(Request $request, $noResi = null)
    {
        $isApi = $request->wantsJson() || $request->is('api/*');

        // Use route param if present, else fallback to query param
        $noResi = $noResi ?? $request->query('noResi');

        Log::info('cekResi called');

        try {
            if (!$noResi) {
                if ($isApi) {
                    return response()->json(['error' => 'Parameter noResi diperlukan'], 400);
                }
                return back()->with('error', 'Nomor resi diperlukan.')->withInput();
            }

            Log::info("cekResi called with noResi: $noResi");

            $reservasi = Reservasi::where('noResi', $noResi)->first();

            if (!$reservasi) {
                Log::warning('Reservation not found for number: ' . $noResi);
                if ($isApi) {
                    return response()->json([
                        'message' => 'Nomor resi tidak ditemukan.'
                    ], 404);
                }
                return back()->with('error', 'Nomor resi tidak ditemukan.')->withInput();
            }

            $riwayat = Riwayat::where('idReservasi', $reservasi->id)
                ->orderBy('created_at', 'desc')
                ->get();

            $jadwal = $reservasi->status === 'confirmed'
                ? Jadwal::where('idReservasi', $reservasi->id)->first()
                : null;

            $statusMapping = [
                'pending'   => 'Menunggu Konfirmasi',
                'confirmed' => 'Sudah Konfirmasi',
                'process'   => 'Proses Perbaikan',
                'completed' => 'Selesai',
                'cancelled' => 'Dibatalkan',
            ];

            $data = [
                'namaLengkap' => $reservasi->namaLengkap,
                'noTelp' => $reservasi->noTelp,
                'servis' => $reservasi->servis,
                'deskripsi' => $reservasi->deskripsi,
                'status' => $statusMapping[$reservasi->status] ?? $reservasi->status,
                'riwayat' => $riwayat,
                'tanggal' => $jadwal?->tanggal,
                'waktuMulai' => $jadwal?->waktuMulai,
                'waktuSelesai' => $jadwal?->waktuSelesai,
                'latitude' => $reservasi->servis === 'Home Service' ? $reservasi->pelanggan->latitude ?? null : null,
                'longitude' => $reservasi->servis === 'Home Service' ? $reservasi->pelanggan->longitude ?? null : null,
                'alamat' => $reservasi->servis === 'Home Service' ? $reservasi->alamatLengkap : null,
            ];

            Log::info('Reservation data retrieved successfully for: ' . $noResi);

            return response()->json([
                'success' => true,
                'message' => 'Data reservasi ditemukan.',
                'data' => $data
            ]);

        } catch (\Exception $e) {
            Log::error('Error while checking reservation: ' . $e->getMessage(), [
                'line' => $e->getLine(),
                'file' => $e->getFile(),
                'trace' => $e->getTraceAsString(),
            ]);

            if ($isApi) {
                return response()->json([
                    'message' => 'Terjadi kesalahan saat memproses permintaan.',
                ], 500);
            }

            return back()->with('error', 'Terjadi kesalahan saat memproses permintaan.');
        }
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

    // public function formTambahUlasan()
    // {
    //     return view('services.tambahulasan');
    // }

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
