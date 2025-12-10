@extends('layouts.luxe')

@section('title', 'Edit Stok')

@section('content')
    <!-- Breadcrumb -->
    <div style="margin-bottom: 12px;">
        <a href="{{ route('stok.index') }}" class="muted" style="text-decoration: none; font-size: 14px;">← Kembali ke Daftar Stok</a>
    </div>

    <!-- Header -->
    <div class="card" style="background: linear-gradient(135deg, rgba(147, 51, 234, 0.12) 0%, rgba(125, 209, 255, 0.08) 100%); border-left: 4px solid #9333ea;">
        <h2 style="margin:0; color: #fff;">✏️ Edit Stok</h2>
        <p class="muted" style="margin:4px 0 0;">Perbarui informasi stok untuk produk dan toko</p>
    </div>

    <!-- Form -->
    <div class="card" style="margin-top: 16px;">
        <form action="{{ route('stok.update', $stok->id) }}" method="POST" class="grid" style="grid-template-columns: 1fr; gap: 16px;">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="product_id">Produk *</label>
                <select id="product_id" name="product_id" required>
                    <option value="">Pilih Produk</option>
                    @foreach($products as $product)
                        <option value="{{ $product->id }}" {{ old('product_id', $stok->product_id) == $product->id ? 'selected' : '' }}>
                            {{ $product->nama_produk }} - Rp {{ number_format($product->harga, 0, ',', '.') }}
                        </option>
                    @endforeach
                </select>
                @error('product_id')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="toko_id">Toko *</label>
                <select id="toko_id" name="toko_id" required>
                    <option value="">Pilih Toko</option>
                    @foreach($tokos as $toko)
                        <option value="{{ $toko->id }}" {{ old('toko_id', $stok->toko_id) == $toko->id ? 'selected' : '' }}>
                            {{ $toko->nama_toko }}
                        </option>
                    @endforeach
                </select>
                @error('toko_id')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="jumlah">Jumlah *</label>
                <input type="number" id="jumlah" name="jumlah" value="{{ old('jumlah', $stok->jumlah) }}" min="0" required>
                @error('jumlah')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div style="display: flex; gap: 10px; justify-content: flex-end;">
                <a href="{{ route('stok.index') }}" class="btn btn-ghost">Batal</a>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
@endsection
