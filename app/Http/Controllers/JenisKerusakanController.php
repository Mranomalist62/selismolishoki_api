<?php

namespace App\Http\Controllers;

use App\Models\JenisKerusakan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

 class JenisKerusakanController extends Controller
 {
    public function getJenisKerusakanList()
    {
        try {
            $jenisKerusakan = JenisKerusakan::select(['id', 'nama'])->get();

            if ($jenisKerusakan->isEmpty()) {
                return response()->json([
                    'status' => 'fail',
                    'message' => 'Data jenis kerusakan tidak ditemukan.',
                    'data' => []
                ], 404); // 404 Not Found
            }

            return response()->json([
                'status' => 'success',
                'data' => $jenisKerusakan
            ], 200); // 200 OK

        } catch (\Illuminate\Database\QueryException $e) {
            Log::error('Database error: ' . $e);
            return response()->json([
                'status' => 'error',
                'message' => 'Gagal mengakses database.',
                'error' => config('app.debug') ? $e->getMessage() : null
            ], 500); // 500 Internal Server Error

        } catch (\Exception $e) {
            Log::error('Internal error: ' . $e);
            return response()->json([
                'status' => 'error',
                'message' => 'Terjadi kesalahan internal.',
                'error' => config('app.debug') ? $e->getMessage() : null
            ], 500); // 500 Internal Server Error
        }
    }

    public function getPartsByJenisKerusakan($id)
    {
        try {
            $jenisKerusakan = JenisKerusakan::with('parts:id,nama,harga')
                ->select(['id', 'nama'])
                ->find($id);

            if (!$jenisKerusakan) {
                return response()->json([
                    'status' => 'fail',
                    'message' => 'Jenis kerusakan tidak ditemukan.',
                    'data' => []
                ], 404);
            }

            $parts = $jenisKerusakan->parts;

            if ($parts->isEmpty()) {
                return response()->json([
                    'status' => 'fail',
                    'message' => 'Tidak ada parts terkait untuk jenis kerusakan ini.',
                    'data' => []
                ], 404);
            }

            return response()->json([
                'status' => 'success',
                'data' => $parts
            ], 200);

        } catch (\Illuminate\Database\QueryException $e) {
            Log::error('Database error: ' . $e);
            return response()->json([
                'status' => 'error',
                'message' => 'Gagal mengakses database.',
                'error' => config('app.debug') ? $e->getMessage() : null
            ], 500);

        } catch (\Exception $e) {
            Log::error('Internal error: ' . $e);
            return response()->json([
                'status' => 'error',
                'message' => 'Terjadi kesalahan internal.',
                'error' => config('app.debug') ? $e->getMessage() : null
            ], 500);
        }
    }


//     public function index()
//     {
//         $jenisKerusakan = JenisKerusakan::all();
//         return view('admin.JenisKerusakan.index', compact('jenisKerusakan'));
//     }

//     public function create()
//     {
//         return view('admin.JenisKerusakan.create');
//     }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'nama' => 'required|string|max:255',
    //     ]);

    //     JenisKerusakan::create($request->all());
    //     return redirect()->route('JenisKerusakan.index')->with('success', 'Jenis kerusakan berhasil ditambahkan.');
    // }

//     public function edit(JenisKerusakan $jenisKerusakan)
//     {
//         return view('admin.JenisKerusakan.edit', compact('jenisKerusakan'));
//     }

//     public function update(Request $request, JenisKerusakan $jenisKerusakan)
//     {
//         $request->validate([
//             'nama' => 'required|string|max:255',
//         ]);

//         $jenisKerusakan->update($request->all());
//         return redirect()->route('JenisKerusakan.index')->with('success', 'Jenis kerusakan berhasil diperbarui.');
//     }

//     public function destroy(JenisKerusakan $jenisKerusakan)
//     {
//         $jenisKerusakan->delete();
//         return redirect()->route('JenisKerusakan.index')->with('success', 'Jenis kerusakan berhasil dihapus.');
//     }
}
