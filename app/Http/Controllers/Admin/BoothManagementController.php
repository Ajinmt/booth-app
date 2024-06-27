<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booth;
use Illuminate\Http\Request;

class BoothManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $booths = Booth::all();
        return view('admin.booth-management.index', compact('booths'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.booth-management.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'nama' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'deskripsi' => 'nullable|string',
            // Tambahkan validasi lain sesuai kebutuhan
        ]);

        $booth = new Booth();
        $booth->nama = $request->nama;
        $booth->harga = $request->harga;
        $booth->deskripsi = $request->deskripsi;

        $booth->save();
    
        return redirect()->route('booth-management.index')->with('success', 'New Booth has been created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $booth = Booth::find($id);
        return view('admin.booth-management.edit', compact('booth'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'harga' => 'required|numeric',
        ]);

        $booth = Booth::findOrFail($id);

        $booth->nama = $request->nama;
        $booth->harga = $request->harga;
        $booth->deskripsi = $request->deskripsi;

        $booth->save();

        return redirect()->route('booth-management.index')->with('success', 'Booth updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $booth = Booth::findOrFail($id);
        $booth->delete();
        return redirect()->route('booth-management.index')->with('success', 'Booth berhasil dihapus!');
    }
}
