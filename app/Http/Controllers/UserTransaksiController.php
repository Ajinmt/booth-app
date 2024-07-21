<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Booth;
use App\Models\PurchaseHistory;

class TransaksiController extends Controller
{
    /**
     * Tampilkan daftar transaksi pengguna.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $user = auth()->user();
        $transactions = Transaksi::where('user_id', $user->id)->get();
        return view('user.Transaction.index', compact('transactions'));
    }

    /**
     * Simpan transaksi baru.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $user = auth()->user();
        $booth = Booth::find($request->booth_id);

        $transaksi = new Transaksi([
            'user_id' => $user->id,
            'booth_id' => $booth->id,
            'harga' => $booth->harga,
            'status' => 'pending',
        ]);

        $transaksi->save();

        return redirect()->route('user.transactions.index')->with('success', 'Transaksi berhasil ditambahkan.');
    }
}
