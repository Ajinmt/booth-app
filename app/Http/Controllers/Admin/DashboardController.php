<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BoothLocation;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalBooths = BoothLocation::count();
        $availableBooths = BoothLocation::where('available_stands', '>', 0)->count();
        $bookedBooths = $totalBooths - $availableBooths;

        return view('admin.dashboard', compact('totalBooths', 'availableBooths', 'bookedBooths'));
    }
}
