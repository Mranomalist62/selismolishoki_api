<?php

namespace App\Http\Controllers;

use App\Models\ulasan;
use Illuminate\Http\Request;

// class UlasanController extends Controller
// {
//     public function index(Request $request)
//     {
//         $query = ulasan::query();

//         // Search by name
//         if ($request->filled('search_nama')) {
//             $query->where('nama', 'like', '%' . $request->search_nama . '%');
//         }

//         // Filter by rating
//         if ($request->filled('filter_rating')) {
//             $query->where('rating', $request->filter_rating);
//         }

//         $ulasans = $query->get();

//         return view('admin.ulasan.index', compact('ulasans'));
//     }

//     public function create()
//     {
//         return view('admin.ulasan.create');
//     }

//     public function store(Request $request)
//     {
//         $request->validate([
//             'nama' => 'required|string|max:255',
//             'ulasan' => 'required|string',
//             'rating' => 'required|integer|between:1,5',
//         ]);

//         ulasan::create($request->all());

//         return redirect()->route('ulasan.index')->with('success', 'Ulasan berhasil ditambahkan.');
//     }

//     public function edit(ulasan $ulasan)
//     {
//         return view('admin.ulasan.edit', compact('ulasan'));
//     }

//     public function update(Request $request, ulasan $ulasan)
//     {
//         $request->validate([
//             'nama' => 'required|string|max:255',
//             'ulasan' => 'required|string',
//             'rating' => 'required|integer|between:1,5',
//         ]);

//         $ulasan->update($request->all());

//         return redirect()->route('ulasan.index')->with('success', 'Ulasan berhasil diperbarui.');
//     }

//     public function destroy(ulasan $ulasan)
//     {
//         $ulasan->delete();
//         return redirect()->route('ulasan.index')->with('success', 'Ulasan berhasil dihapus.');
//     }
// }
