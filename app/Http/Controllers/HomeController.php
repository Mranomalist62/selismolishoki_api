<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ulasan;

class HomeController extends Controller
{
    public function index(Request $request)
{
    $ulasans = Ulasan::all();

    // Check if request is API
    if ($request->wantsJson()) {
        return response()->json([
            'success' => true,
            'message' => 'List of Ulasan',
            'data' => $ulasans,
        ], 200);
    }

    // Otherwise return the web view
    return view('home', compact('ulasans'));
}
}
