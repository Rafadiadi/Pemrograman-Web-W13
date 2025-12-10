@extends('layouts.luxe')

@php use Illuminate\Support\Str; @endphp

@section('title', 'Dashboard')

@section('content')
    <!-- Hero Section -->
    <div class="card" style="background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%); border: 1px solid rgba(201, 166, 70, 0.3); margin-bottom: 24px; position: relative; overflow: hidden;">
        <div style="position: absolute; top: -50px; right: -50px; width: 200px; height: 200px; background: radial-gradient(circle, rgba(201, 166, 70, 0.15) 0%, transparent 70%); border-radius: 50%;"></div>
        <div style="position: absolute; bottom: -30px; left: -30px; width: 150px; height: 150px; background: radial-gradient(circle, rgba(125, 209, 255, 0.1) 0%, transparent 70%); border-radius: 50%;"></div>
        <div style="position: relative; z-index: 1;">
            <h1 style="margin: 0 0 8px 0; font-size: 32px; background: linear-gradient(135deg, #c9a646 0%, #7dd1ff 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">
                Selamat Datang, {{ auth()->user()->name ?? 'User' }}
            </h1>
            <p class="muted" style="margin: 0; font-size: 16px;">Kelola bisnis Anda dengan mudah dan efisien</p>
        </div>
    </div>

    <!-- Stats Grid -->
    <div class="grid" style="grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 18px; margin-bottom: 24px;">
        <div class="card" style="background: linear-gradient(135deg, rgba(201, 166, 70, 0.1) 0%, rgba(201, 166, 70, 0.05) 100%); border-left: 4px solid #c9a646;">
            <div style="display: flex; align-items: center; justify-content: space-between;">
                <div>
                    <p class="muted" style="margin: 0 0 4px 0; font-size: 13px; text-transform: uppercase; letter-spacing: 0.5px;">Total Produk</p>
                    <h2 style="margin: 0; font-size: 36px; color: #c9a646;">{{ $totalProducts }}</h2>
                    <p class="muted" style="margin: 4px 0 0 0; font-size: 12px;">Produk terdaftar</p>
                </div>
                <div style="width: 60px; height: 60px; background: rgba(201, 166, 70, 0.2); border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 28px;">
                    📦
                </div>
            </div>
        </div>

        <div class="card" style="background: linear-gradient(135deg, rgba(125, 209, 255, 0.1) 0%, rgba(125, 209, 255, 0.05) 100%); border-left: 4px solid #7dd1ff;">
            <div style="display: flex; align-items: center; justify-content: space-between;">
                <div>
                    <p class="muted" style="margin: 0 0 4px 0; font-size: 13px; text-transform: uppercase; letter-spacing: 0.5px;">Total Toko</p>
                    <h2 style="margin: 0; font-size: 36px; color: #7dd1ff;">{{ $totalToko }}</h2>
                    <p class="muted" style="margin: 4px 0 0 0; font-size: 12px;">Toko aktif</p>
                </div>
                <div style="width: 60px; height: 60px; background: rgba(125, 209, 255, 0.2); border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 28px;">
                    🏪
                </div>
            </div>
        </div>

        <div class="card" style="background: linear-gradient(135deg, rgba(147, 51, 234, 0.1) 0%, rgba(147, 51, 234, 0.05) 100%); border-left: 4px solid #9333ea;">
            <div style="display: flex; align-items: center; justify-content: space-between;">
                <div>
                    <p class="muted" style="margin: 0 0 4px 0; font-size: 13px; text-transform: uppercase; letter-spacing: 0.5px;">Total Stok</p>
                    <h2 style="margin: 0; font-size: 36px; color: #9333ea;">{{ $totalStok }}</h2>
                    <p class="muted" style="margin: 4px 0 0 0; font-size: 12px;">Unit tersedia</p>
                </div>
                <div style="width: 60px; height: 60px; background: rgba(147, 51, 234, 0.2); border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 28px;">
                    📊
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="grid" style="grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 16px; margin-bottom: 24px;">
        <a href="/products" class="card" style="text-decoration: none; transition: all 0.3s ease; border: 1px solid rgba(201, 166, 70, 0.3); cursor: pointer;">
            <div style="text-align: center; padding: 12px 0;">
                <div style="font-size: 32px; margin-bottom: 8px;">📦</div>
                <h4 style="margin: 0; color: #c9a646;">Kelola Produk</h4>
                <p class="muted" style="margin: 4px 0 0 0; font-size: 12px;">Tambah & edit produk</p>
            </div>
        </a>

        <a href="/toko" class="card" style="text-decoration: none; transition: all 0.3s ease; border: 1px solid rgba(125, 209, 255, 0.3); cursor: pointer;">
            <div style="text-align: center; padding: 12px 0;">
                <div style="font-size: 32px; margin-bottom: 8px;">🏪</div>
                <h4 style="margin: 0; color: #7dd1ff;">Kelola Toko</h4>
                <p class="muted" style="margin: 4px 0 0 0; font-size: 12px;">Atur data toko</p>
            </div>
        </a>

        <a href="/stok" class="card" style="text-decoration: none; transition: all 0.3s ease; border: 1px solid rgba(147, 51, 234, 0.3); cursor: pointer;">
            <div style="text-align: center; padding: 12px 0;">
                <div style="font-size: 32px; margin-bottom: 8px;">📊</div>
                <h4 style="margin: 0; color: #9333ea;">Kelola Stok</h4>
                <p class="muted" style="margin: 4px 0 0 0; font-size: 12px;">Monitor inventori</p>
            </div>
        </a>
    </div>

    <!-- Recent Products -->
    <div class="card">
        <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 16px;">
            <h3 style="margin: 0;">📦 Produk Terbaru</h3>
            <a href="/products" class="btn btn-ghost" style="padding: 6px 12px; font-size: 13px;">Lihat Semua →</a>
        </div>
        @if($recentProducts->count() > 0)
            <div style="overflow-x: auto;">
                <table>
                    <thead>
                        <tr>
                            <th style="width: 40%;">Nama Produk</th>
                            <th>Kategori</th>
                            <th>Harga</th>
                            <th>Ditambahkan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($recentProducts as $product)
                            <tr style="transition: background 0.2s ease;">
                                <td>
                                    <strong>{{ $product->nama_produk }}</strong>
                                    @if($product->deskripsi)
                                        <br><span class="muted" style="font-size: 12px;">{{ Str::limit($product->deskripsi, 50) }}</span>
                                    @endif
                                </td>
                                <td>
                                    <span class="badge" style="background: rgba(201, 166, 70, 0.2); color: #c9a646; font-size: 11px;">
                                        {{ $product->kategori ?? 'Umum' }}
                                    </span>
                                </td>
                                <td><strong style="color: #c9a646;">Rp {{ number_format($product->harga, 0, ',', '.') }}</strong></td>
                                <td class="muted" style="font-size: 13px;">{{ $product->created_at->diffForHumans() }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div style="text-align: center; padding: 32px 16px;">
                <div style="font-size: 48px; margin-bottom: 12px; opacity: 0.3;">📦</div>
                <p class="muted">Belum ada produk. <a href="/products/create" style="color: #c9a646;">Tambah produk pertama</a></p>
            </div>
        @endif
    </div>

    <style>
        .card:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
        }
        a.card:hover {
            border-color: rgba(201, 166, 70, 0.6) !important;
            transform: translateY(-4px);
        }
        tbody tr:hover {
            background: rgba(201, 166, 70, 0.05) !important;
        }
    </style>
@endsection
