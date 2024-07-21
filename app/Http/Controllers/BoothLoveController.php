<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booth;


class BoothLoveController extends Controller
{
    public function toggleFavorite($id)
{
    $booth = Booth::findOrFail($id);
    $user = auth()->user();
    
    if ($user->favorites()->where('booth_id', $booth->id)->exists()) {
        $user->favorites()->detach($booth->id);
    } else {
        $user->favorites()->attach($booth->id);
    }

    return redirect('/pesan_booth');
}
}
