<?php

namespace App\Http\Controllers;

use App\Models\Toko;
use Illuminate\Http\Request;

class TokoController extends Controller
{
    public function index()
    {
        $tokos = Toko::latest()->paginate(10);
        return view('toko.index', compact('tokos'));
    }

    public function create()
    {
        return view('toko.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_toko' => 'required|max:255',
            'alamat' => 'required',
            'telepon' => 'required|max:20',
            'email' => 'nullable|email',
        ]);

        Toko::create($request->all());

        return redirect()->route('toko.index')
                        ->with('success', 'Toko berhasil ditambahkan!');
    }

    public function show(Toko $toko)
    {
        $toko->load('stok.product');
        return view('toko.show', compact('toko'));
    }

    public function edit(Toko $toko)
    {
        return view('toko.edit', compact('toko'));
    }

    public function update(Request $request, Toko $toko)
    {
        $request->validate([
            'nama_toko' => 'required|max:255',
            'alamat' => 'required',
            'telepon' => 'required|max:20',
            'email' => 'nullable|email',
        ]);

        $toko->update($request->all());

        return redirect()->route('toko.index')
                        ->with('success', 'Toko berhasil diupdate!');
    }

    public function destroy(Toko $toko)
    {
        $toko->delete();

        return redirect()->route('toko.index')
                        ->with('success', 'Toko berhasil dihapus!');
    }
}
