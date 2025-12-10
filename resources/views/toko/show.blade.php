@extends('layouts.luxe')

@section('title', 'Detail Toko')

@section('content')
    <div class="card" style="display:flex; justify-content: space-between; align-items: center; gap: 12px; flex-wrap: wrap;">
        <div>
            <h2 style="margin:0;">Detail Toko</h2>
            <p class="muted" style="margin:4px 0 0;">Informasi lengkap toko.</p>
        </div>
        <div class="actions" style="justify-content:flex-end;">
            <a href="{{ route('toko.edit', $toko->id) }}" class="btn btn-ghost">Edit</a>
            <a href="{{ route('toko.index') }}" class="btn btn-primary">Kembali</a>
        </div>
    </div>

    <div class="card">
        <h3 style="margin-top:0;">Informasi Toko</h3>
        <table>
            <tr>
                <th style="width: 200px;">ID</th>
                <td>{{ $toko->id }}</td>
            </tr>
            <tr>
                <th>Nama Toko</th>
                <td>{{ $toko->nama_toko }}</td>
            </tr>
            <tr>
                <th>Alamat</th>
                <td>{{ $toko->alamat }}</td>
            </tr>
            <tr>
                <th>Telepon</th>
                <td>{{ $toko->telepon }}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{ $toko->email ?? '-' }}</td>
            </tr>
            <tr>
                <th>Dibuat</th>
                <td>{{ $toko->created_at->format('d/m/Y H:i') }}</td>
            </tr>
            <tr>
                <th>Diupdate</th>
                <td>{{ $toko->updated_at->format('d/m/Y H:i') }}</td>
            </tr>
        </table>
    </div>

    <div class="card">
        <h3 style="margin-top:0;">Stok Produk di Toko Ini</h3>
        @if($toko->stok->count() > 0)
            <table>
                <thead>
                    <tr>
                        <th>Produk</th>
                        <th>Jumlah Stok</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($toko->stok as $item)
                    <tr>
                        <td>{{ $item->product->nama_produk }}</td>
                        <td>{{ $item->jumlah }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="muted" style="text-align: center; padding: 1rem 0;">Belum ada stok produk di toko ini.</p>
        @endif
    </div>
@endsection
