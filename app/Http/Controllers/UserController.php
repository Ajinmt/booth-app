<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class UserController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $pendingTransaksi = $user->transaksi()->with('booth')->where('status', 'pending')->get();
        $boothLove = $user->favorites()->get();
        $purchaseHistory = $user->purchaseHistory()->with('booth')->get();

        return view('userPage', compact('user', 'pendingTransaksi', 'boothLove', 'purchaseHistory'));
    }

}
