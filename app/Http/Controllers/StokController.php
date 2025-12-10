<?php

namespace App\Http\Controllers;

use App\Models\Stok;
use App\Models\Product;
use App\Models\Toko;
use Illuminate\Http\Request;

class StokController extends Controller
{
    public function index()
    {
        $stoks = Stok::with(['product', 'toko'])->latest()->paginate(10);
        return view('stok.index', compact('stoks'));
    }

    public function create()
    {
        $products = Product::all();
        $tokos = Toko::all();
        return view('stok.create', compact('products', 'tokos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'toko_id' => 'required|exists:toko,id',
            'jumlah' => 'required|integer|min:0',
        ]);

        $existingStok = Stok::where('product_id', $request->product_id)
                           ->where('toko_id', $request->toko_id)
                           ->first();

        if ($existingStok) {
            $existingStok->jumlah += $request->jumlah;
            $existingStok->save();
            $message = 'Stok berhasil ditambahkan ke data yang sudah ada!';
        } else {
            Stok::create($request->all());
            $message = 'Stok berhasil ditambahkan!';
        }

        return redirect()->route('stok.index')
                        ->with('success', $message);
    }

    public function show(Stok $stok)
    {
        $stok->load(['product', 'toko']);
        return view('stok.show', compact('stok'));
    }

    public function edit(Stok $stok)
    {
        $products = Product::all();
        $tokos = Toko::all();
        return view('stok.edit', compact('stok', 'products', 'tokos'));
    }

    public function update(Request $request, Stok $stok)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'toko_id' => 'required|exists:toko,id',
            'jumlah' => 'required|integer|min:0',
        ]);

        $stok->update($request->all());

        return redirect()->route('stok.index')
                        ->with('success', 'Stok berhasil diupdate!');
    }

    public function destroy(Stok $stok)
    {
        $stok->delete();

        return redirect()->route('stok.index')
                        ->with('success', 'Stok berhasil dihapus!');
    }
}
