@extends('layouts.luxe')

@section('title', 'Detail Stok')

@section('content')
    <!-- Breadcrumb -->
    <div style="margin-bottom: 12px; display:flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 10px;">
        <div>
            <a href="{{ route('stok.index') }}" class="muted" style="text-decoration: none; font-size: 14px;">← Kembali ke Daftar Stok</a>
        </div>
        <div style="display:flex; gap: 10px;">
            <a href="{{ route('stok.edit', $stok->id) }}" class="btn btn-ghost">✏️ Edit</a>
            <a href="{{ route('stok.index') }}" class="btn btn-primary">Kembali</a>
        </div>
    </div>

    <!-- Header -->
    <div class="card" style="background: linear-gradient(135deg, rgba(147, 51, 234, 0.12) 0%, rgba(125, 209, 255, 0.08) 100%); border-left: 4px solid #9333ea; margin-bottom: 16px;">
        <h2 style="margin:0; color: #fff;">📦 Detail Stok</h2>
        <p class="muted" style="margin:4px 0 0;">Informasi stok per produk dan toko</p>
    </div>

    <div class="card">
        <div class="grid" style="grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 16px;">
            <div style="background: rgba(147, 51, 234, 0.08); padding: 14px; border-radius: 10px; border: 1px solid rgba(147, 51, 234, 0.2);">
                <p class="muted" style="margin: 0; font-size: 12px; text-transform: uppercase; letter-spacing: 0.5px;">Produk</p>
                <h3 style="margin: 4px 0 0;">{{ $stok->product->nama_produk }}</h3>
                <p class="muted" style="margin: 4px 0 0; font-size: 13px;">Rp {{ number_format($stok->product->harga, 0, ',', '.') }}</p>
            </div>
            <div style="background: rgba(125, 209, 255, 0.08); padding: 14px; border-radius: 10px; border: 1px solid rgba(125, 209, 255, 0.2);">
                <p class="muted" style="margin: 0; font-size: 12px; text-transform: uppercase; letter-spacing: 0.5px;">Toko</p>
                <h3 style="margin: 4px 0 0;">{{ $stok->toko->nama_toko }}</h3>
                <p class="muted" style="margin: 4px 0 0; font-size: 13px;">{{ $stok->toko->alamat }}</p>
            </div>
            <div style="background: rgba(201, 166, 70, 0.08); padding: 14px; border-radius: 10px; border: 1px solid rgba(201, 166, 70, 0.2);">
                <p class="muted" style="margin: 0; font-size: 12px; text-transform: uppercase; letter-spacing: 0.5px;">Jumlah</p>
                <h3 style="margin: 4px 0 0; color: #c9a646;">{{ $stok->jumlah }} unit</h3>
            </div>
        </div>

        <div style="margin-top: 16px; background: rgba(255,255,255,0.02); border-radius: 10px; padding: 12px; border: 1px solid rgba(255,255,255,0.04);">
            <p class="muted" style="margin: 0 0 6px 0; font-size: 12px;">Metadata</p>
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(180px, 1fr)); gap: 8px;">
                <div><span class="muted">ID:</span> #{{ $stok->id }}</div>
                <div><span class="muted">Dibuat:</span> {{ $stok->created_at->format('d/m/Y H:i') }}</div>
                <div><span class="muted">Diupdate:</span> {{ $stok->updated_at->format('d/m/Y H:i') }}</div>
            </div>
        </div>
    </div>
@endsection
