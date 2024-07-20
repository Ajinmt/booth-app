<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function index()
    {
        $user = Auth::user();
         $transaksi = $user->transaksi()->with('booth')->get();
        return view('userPage', compact('user' , 'transaksi'));
    }

    // public function showTransaction()
    // {
    //     $user = Auth::user();
        
    //     return view('userPage', compact('transaksi'));
    // }
}
