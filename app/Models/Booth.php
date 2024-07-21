<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Booth extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'harga', 
        'deskripsi',
        'status',
    ];

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class);
    }
    public function users()
    {
    return $this->belongsToMany(User::class, 'favorites');
    }

    public function favoritedBy(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'favorites');
    }
    public function isFavorited()
    {
        if (auth()->check()) {
            return auth()->user()->favorites()->where('booth_id', $this->id)->exists();
        }

        return false;
    }
}
