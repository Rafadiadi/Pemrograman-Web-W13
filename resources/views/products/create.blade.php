@extends('layouts.luxe')

@section('title', 'Tambah Produk')

@section('content')
    <!-- Breadcrumb -->
    <div style="margin-bottom: 16px;">
        <a href="{{ route('products.index') }}" class="muted" style="text-decoration: none; font-size: 14px;">← Kembali ke Daftar Produk</a>
    </div>
    <div class="card" style="max-width: 720px; margin: 0 auto;">
        <h2 style="margin-top:0;">➕ Tambah Produk Baru</h2>
        <p class="muted" style="margin-bottom: 18px;">Lengkapi detail produk untuk menambahkannya.</p>

        <form action="{{ route('products.store') }}" method="POST" class="fields">
            @csrf

            <div>
                <label>Nama Produk</label>
                <input type="text" name="nama_produk" placeholder="Nama Produk" value="{{ old('nama_produk') }}" required>
            </div>

            <div>
                <label>Harga Produk</label>
                <input type="text" name="harga" id="harga" placeholder="Harga Produk" value="{{ old('harga') }}" required>
            </div>

            <div>
                <label>Deskripsi</label>
                <textarea name="deskripsi" placeholder="Deskripsi Produk" rows="4" required>{{ old('deskripsi') }}</textarea>
            </div>

            <div class="actions" style="justify-content:flex-end;">
                <a href="{{ route('products.index') }}" class="btn btn-ghost">Batal</a>
                <button type="submit" class="btn btn-primary">Simpan Produk</button>
            </div>
        </form>
    </div>

    <script>
    const hargaInput = document.getElementById('harga');
    
    hargaInput.addEventListener('input', function(e) {
        let value = e.target.value.replace(/[^\d]/g, '');
        if (value) {
            e.target.value = new Intl.NumberFormat('id-ID').format(value);
        }
    });

    hargaInput.closest('form').addEventListener('submit', function(e) {
        hargaInput.value = hargaInput.value.replace(/\./g, '');
    });
    </script>
@endsection
