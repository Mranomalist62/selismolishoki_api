<?php

namespace App\Http\Controllers;

use App\Models\JenisKerusakan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

 class JenisKerusakanController extends Controller
 {
    public function getJenisKerusakanList(Request $request)
    {
        $isApi = $request->wantsJson() || $request->is('api/*');

        try {
            $jenisKerusakan = JenisKerusakan::select(['id', 'nama'])->get();

            if ($jenisKerusakan->isEmpty()) {


                if ($isApi) {
                    return response()->json([
                        'status' => 'fail',
                        'message' => 'Data jenis kerusakan tidak ditemukan.',
                        'data' => []
                    ], 404);
                }

                return view('kerusakan.index', [
                    'message' => 'Data jenis kerusakan tidak ditemukan.',
                    'data' => []
                ]);
            }

            if ($isApi) {
                return response()->json([
                    'status' => 'success',
                    'data' => $jenisKerusakan
                ], 200);
            }

            return view('kerusakan.index', [
                'data' => $jenisKerusakan
            ]);

        } catch (\Illuminate\Database\QueryException $e) {
            Log::error('Database error: ' . $e);

            if ($isApi) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Gagal mengakses database.',
                    'error' => config('app.debug') ? $e->getMessage() : null
                ], 500);
            }

            return view('kerusakan.index', [
                'error' => 'Gagal mengakses database.',
                'data' => []
            ]);

        } catch (\Exception $e) {
            Log::error('Internal error: ' . $e);

            if ($isApi) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Terjadi kesalahan internal.',
                    'error' => config('app.debug') ? $e->getMessage() : null
                ], 500);
            }

            return view('kerusakan.index', [
                'error' => 'Terjadi kesalahan internal.',
                'data' => []
            ]);
        }
    }

    public function getPartsByJenisKerusakan(Request $request, $id)
    {
        $isApi = $request->wantsJson() || $request->is('api/*');

        try {
            $jenisKerusakan = JenisKerusakan::with('parts:id,nama,harga')
                ->select(['id', 'nama'])
                ->find($id);

            if (!$jenisKerusakan) {
                if ($isApi) {
                    return response()->json([
                        'status' => 'fail',
                        'message' => 'Jenis kerusakan tidak ditemukan.',
                        'data' => []
                    ], 404);
                }

                return view('kerusakan.parts', [
                    'error' => 'Jenis kerusakan tidak ditemukan.',
                    'parts' => [],
                    'jenisKerusakan' => null,
                ]);
            }

            $parts = $jenisKerusakan->parts;

            if ($parts->isEmpty()) {
                if ($isApi) {
                    return response()->json([
                        'status' => 'fail',
                        'message' => 'Tidak ada parts terkait untuk jenis kerusakan ini.',
                        'data' => []
                    ], 404);
                }

                return view('kerusakan.parts', [
                    'message' => 'Tidak ada parts terkait untuk jenis kerusakan ini.',
                    'parts' => [],
                    'jenisKerusakan' => $jenisKerusakan,
                ]);
            }

            if ($isApi) {
                return response()->json([
                    'status' => 'success',
                    'data' => $parts
                ], 200);
            }

            return view('kerusakan.parts', [
                'jenisKerusakan' => $jenisKerusakan,
                'parts' => $parts,
            ]);

        } catch (\Illuminate\Database\QueryException $e) {
            Log::error('Database error: ' . $e);

            if ($isApi) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Gagal mengakses database.',
                    'error' => config('app.debug') ? $e->getMessage() : null
                ], 500);
            }

            return view('kerusakan.parts', [
                'error' => 'Gagal mengakses database.',
                'parts' => [],
                'jenisKerusakan' => null,
            ]);

        } catch (\Exception $e) {
            Log::error('Internal error: ' . $e);

            if ($isApi) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Terjadi kesalahan internal.',
                    'error' => config('app.debug') ? $e->getMessage() : null
                ], 500);
            }

            return view('kerusakan.parts', [
                'error' => 'Terjadi kesalahan internal.',
                'parts' => [],
                'jenisKerusakan' => null,
            ]);
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
