@extends('layouts.luxe')

@section('title', 'Stok')

@section('content')
    <!-- Header Section -->
    <div class="card" style="background: linear-gradient(135deg, rgba(147, 51, 234, 0.12) 0%, rgba(125, 209, 255, 0.08) 100%); border-left: 4px solid #9333ea; margin-bottom: 20px;">
        <div style="display:flex; justify-content: space-between; align-items: center; gap: 12px; flex-wrap: wrap;">
            <div>
                <h2 style="margin:0; color: #fff;">📊 Daftar Stok</h2>
                <p class="muted" style="margin:4px 0 0;">Kelola persediaan lintas toko</p>
            </div>
            <a href="{{ route('stok.create') }}" class="btn btn-primary" style="box-shadow: 0 4px 12px rgba(147, 51, 234, 0.3);">+ Tambah Stok</a>
        </div>
    </div>

    <div class="card">
        @if($stoks->count() > 0)
            <div style="overflow-x: auto;">
                <table>
                    <thead>
                        <tr>
                            <th style="width: 70px;">ID</th>
                            <th>Produk</th>
                            <th>Toko</th>
                            <th style="width: 120px;">Jumlah</th>
                            <th style="width: 200px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($stoks as $stok)
                        <tr>
                            <td><span class="badge" style="background: rgba(147, 51, 234, 0.15); color: #c9a646;">#{{ $stok->id }}</span></td>
                            <td>
                                <strong>{{ $stok->product->nama_produk }}</strong><br>
                                <span class="muted" style="font-size: 12px;">Rp {{ number_format($stok->product->harga, 0, ',', '.') }}</span>
                            </td>
                            <td>{{ $stok->toko->nama_toko }}</td>
                            <td><strong style="color: #9333ea;">{{ $stok->jumlah }}</strong></td>
                            <td>
                                <div class="actions" style="gap: 8px; justify-content:flex-start;">
                                    <a href="{{ route('stok.show', $stok->id) }}" class="btn btn-ghost">👁️ Lihat</a>
                                    <a href="{{ route('stok.edit', $stok->id) }}" class="btn btn-ghost">✏️ Edit</a>
                                    <form action="{{ route('stok.destroy', $stok->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin hapus stok ini?')">🗑️ Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            @if($stoks->hasPages())
                <div class="card" style="margin-top: 12px; background: rgba(147, 51, 234, 0.08);">
                    {{ $stoks->links() }}
                </div>
            @endif
        @else
            <div style="text-align: center; padding: 48px 24px;">
                <div style="font-size: 64px; margin-bottom: 12px; opacity: 0.3;">📊</div>
                <p class="muted">Belum ada stok. <a href="{{ route('stok.create') }}" style="color: #c9a646;">Tambah stok pertama</a></p>
            </div>
        @endif
    </div>

    <style>
        tbody tr:hover { background: rgba(147, 51, 234, 0.05); }
    </style>
@endsection
