<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BoothLocation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BoothLocationController extends Controller
{
    public function index()
    {
        $boothLocations = BoothLocation::all();
        return view('admin.booth-locations.index', compact('boothLocations'));
    }

    public function create()
    {
        return view('admin.booth-locations.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'available_stands' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $boothLocation = new BoothLocation();
        $boothLocation->name = $request->name;
        $boothLocation->description = $request->description;
        $boothLocation->available_stands = $request->available_stands;
        $boothLocation->price = $request->price;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('booth-images', 'public');
            $boothLocation->image = $imagePath;
        }

        $boothLocation->save();

        return redirect()->route('booth-locations.index')->with('success', 'Lokasi booth berhasil ditambahkan.');
    }

    public function edit(BoothLocation $boothLocation)
    {
        return view('admin.booth-locations.edit', compact('boothLocation'));
    }

    public function update(Request $request, BoothLocation $boothLocation)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'available_stands' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $boothLocation->name = $request->name;
        $boothLocation->description = $request->description;
        $boothLocation->available_stands = $request->available_stands;
        $boothLocation->price = $request->price;

        if ($request->hasFile('image')) {
            if ($boothLocation->image) {
                Storage::disk('public')->delete($boothLocation->image);
            }
            $imagePath = $request->file('image')->store('booth-images', 'public');
            $boothLocation->image = $imagePath;
        }

        $boothLocation->save();

        return redirect()->route('booth-locations.index')->with('success', 'Lokasi booth berhasil diperbarui.');
    }

    public function destroy(BoothLocation $boothLocation)
    {
        if ($boothLocation->image) {
            Storage::disk('public')->delete($boothLocation->image);
        }

        $boothLocation->delete();

        return redirect()->route('booth-locations.index')->with('success', 'Lokasi booth berhasil dihapus.');
    }
}
