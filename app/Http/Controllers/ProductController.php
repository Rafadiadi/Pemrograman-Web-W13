<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->paginate(10);
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required|max:255',
            'deskripsi' => 'nullable',
            'harga' => 'required|numeric|between:0,999999999999.99',
            'kategori' => 'nullable|max:100',
        ]);

        Product::create($request->all());

        return redirect()->route('products.index')
                        ->with('success', 'Produk berhasil ditambahkan!');
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'nama_produk' => 'required|max:255',
            'deskripsi' => 'nullable',
            'harga' => 'required|numeric|between:0,999999999999.99',
            'kategori' => 'nullable|max:100',
        ]);

        $product->update($request->all());

        return redirect()->route('products.index')
                        ->with('success', 'Produk berhasil diupdate!');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')
                        ->with('success', 'Produk berhasil dihapus!');
    }
}
