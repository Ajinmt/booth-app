<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booth;

class HomeController extends Controller
{
    public function index()
    {
        // Fetch all booths from the database
        $booths = Booth::all();

        // Pass the booths to the view
        return view('home', compact('booths'));
    }
}
