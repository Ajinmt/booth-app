<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booth;
class OrderController extends Controller
{
    public function index(){
         // Fetch all booths from the database
        $booths = Booth::all();
        
        // Pass the booths to the view
        return view('orderPage', compact('booths'));

    }
    public function pesan($id)
    {
        
        return redirect()->away("https://wa.me/6281234567890?text=Halo%20saya%20tertarik%20untuk%20memesan%20booth%20$id%20di%20acara%20anda.%20Silakan%20konfirmasi%20ketersediaan%20dan%20harga.");
    }

    public function pesanBooth($id){
        $booth = Booth::findOrFail($id);
        return view('orderPage', compact('booth'));
    }
}