<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ulasans;

class HomeController extends Controller
{
    public function index()
    {
        $ulasans = Ulasans::all(); // Fetch all reviews

        return view('home', compact('ulasans')); // Adjust the view name as necessary
    }
}
