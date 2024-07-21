<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\PurchaseHistory;

class AdminTransaksiController extends Controller
{
        /**
     * Tampilkan daftar transaksi pending.
     *
     * @return \Illuminate\View\View
     */
    public function pendingTransactions()
    {
        $pendingTransactions = Transaksi::where('status', 'pending')->get();
        return view('admin.Transaction.pending_transaction', compact('pendingTransactions'));
    }

    /**
     * Tampilkan form untuk mengubah status transaksi.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $transaction = Transaksi::findOrFail($id);
        return view('admin.Transaction.update_status', compact('transaction'));
    }

    /**
     * Proses perubahan status transaksi.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateStatus(Request $request, $id)
    {
        $transaction = Transaksi::findOrFail($id);
        $transaction->status = $request->input('status');
        $transaction->save();

        if ($transaction->status == 'lunas') {
            PurchaseHistory::create([
                'user_id' => $transaction->user_id,
                'booth_id' => $transaction->booth_id,
                'status' => $transaction->status,
                'harga' => $transaction->harga,
            ]);

            // Opsional: Hapus data dari tabel transaksi jika diperlukan
            // $transaction->delete();
        }

        return redirect()->route('transactions.pending')->with('success', 'Status berhasil diubah!');
    }
}
