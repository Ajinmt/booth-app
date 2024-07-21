<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PurchaseHistory extends Model
{
    protected $fillable = ['user_id', 'booth_id', 'status', 'harga'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function booth()
    {
        return $this->belongsTo(Booth::class);
    }
}
