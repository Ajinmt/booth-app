<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booth;
use App\Models\Transaksi;

class TransaksiController extends Controller
{
    public function storeTransaction(Request $request)
{
    $user = auth()->user();
    $booth = Booth::find($request->booth_id);

    $transaksi = new transaksi([
        'user_id' => $user->id,
        'booth_id' => $booth->id,
        'harga' => $booth->harga,
        'status' => 'pending', // atau status lainnya
    ]);

    $transaksi->save();

    // return redirect()->route('/')->with('success', 'Transaksi berhasil ditambahkan.');

      return redirect()->intended('/userPage');
}

}
