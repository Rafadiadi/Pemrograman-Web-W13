@extends('layouts.luxe')

@section('title', 'Edit Produk')

@section('content')
    <!-- Breadcrumb -->
    <div style="margin-bottom: 16px;">
        <a href="{{ route('products.index') }}" class="muted" style="text-decoration: none; font-size: 14px;">← Kembali ke Daftar Produk</a>
    </div>
    <div class="card" style="max-width: 720px; margin: 0 auto;">
        <h2 style="margin-top:0;">✏️ Edit Produk</h2>
        <p class="muted" style="margin-bottom: 18px;">Perbarui detail produk Anda.</p>

        <form action="{{ route('products.update', $product->id) }}" method="POST" class="fields">
            @csrf
            @method('PUT')

            <div>
                <label>Nama Produk</label>
                <input type="text" name="nama_produk" value="{{ old('nama_produk', $product->nama_produk) }}" required>
            </div>

            <div>
                <label>Harga Produk</label>
                <input type="number" name="harga" value="{{ old('harga', $product->harga) }}" required>
            </div>

            <div>
                <label>Deskripsi</label>
                <textarea name="deskripsi" rows="4" required>{{ old('deskripsi', $product->deskripsi) }}</textarea>
            </div>

            <div class="actions" style="justify-content:flex-end;">
                <a href="{{ route('products.index') }}" class="btn btn-ghost">Batal</a>
                <button type="submit" class="btn btn-primary">Update Produk</button>
            </div>
        </form>
    </div>
@endsection
