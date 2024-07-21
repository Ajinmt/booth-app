<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\PurchaseHistory;

class PurchaseHistorYController extends Controller
{
     public function updateTransactionStatus($transactionId)
    {
        $transaction = Transaksi::findOrFail($transactionId);

        if ($transaction->status == 'lunas') {
            PurchaseHistory::create([
                'user_id' => $transaction->user_id,
                'booth_id' => $transaction->booth_id,
                'status' => $transaction->status,
                'harga' => $transaction->harga,
            ]);

            // Optional: Hapus data dari tabel transaksi jika diperlukan
            // $transaction->delete();
        }


        // return e iki diganti ndek halaman dashboard awal ae
        return response()->json(['message' => 'Status updated and history recorded']);
    }
}
