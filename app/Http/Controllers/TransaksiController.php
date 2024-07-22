<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booth;
use App\Models\Transaksi;
use App\Models\PurchaseHistory;
use Barryvdh\DomPDF\Facade\Pdf;

class TransaksiController extends Controller
{
    public function storeTransaction(Request $request)
{
    $user = auth()->user();
    $booth = Booth::find($request->booth_id);

    $existingTransaction = Transaksi::where('user_id', $user->id)
                                     ->where('booth_id', $booth->id)
                                     ->first();

    if ($existingTransaction) {
        return redirect()->back()->with('error', 'Anda Telah Memilih Booth Ini.');
    }

    $transaksi = new transaksi([
        'user_id' => $user->id,
        'booth_id' => $booth->id,
        'harga' => $booth->harga,
        'status' => 'pending', 
    ]);

    $transaksi->save();

      return redirect()->intended('/userPage');
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

        return redirect()->route('transaction.edit', $transaction->id)->with('success', 'Status berhasil diubah!');
    }

       public function downloadPdf($id)
    {
        $transaction = Transaksi::findOrFail($id);
        $pdf = PDF::loadView('transaksiPdf', compact('transaction'));
        return $pdf->download('transaction-'.$id.'.pdf');
    }
}

