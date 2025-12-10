@php use Illuminate\Support\Str; @endphp
@extends('layouts.luxe')

@section('title', 'Produk')

@section('content')
    <!-- Header Section -->
    <div class="card" style="background: linear-gradient(135deg, rgba(201, 166, 70, 0.1) 0%, rgba(201, 166, 70, 0.05) 100%); border-left: 4px solid #c9a646;">
        <div style="display:flex; justify-content: space-between; align-items: center; gap: 12px; flex-wrap: wrap;">
            <div>
                <h2 style="margin:0; color: #c9a646;">📦 Daftar Produk</h2>
                <p class="muted" style="margin:4px 0 0;">Kelola {{ $products->count() }} produk dalam sistem</p>
            </div>
            <a href="{{ route('products.create') }}" class="btn btn-primary" style="box-shadow: 0 4px 12px rgba(201, 166, 70, 0.3);">+ Tambah Produk</a>
        </div>
    </div>

    @if($products->count() > 0)
        <!-- Grid View -->
        <div class="grid" style="grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 20px; margin-bottom: 24px;">
            @foreach ($products as $p)
                <div class="card" style="position: relative; border: 1px solid rgba(201, 166, 70, 0.2); transition: all 0.3s ease;">
                    <!-- Product Badge -->
                    <div style="position: absolute; top: 12px; right: 12px;">
                        <span class="badge" style="background: rgba(201, 166, 70, 0.2); color: #c9a646; font-size: 11px;">
                            #{{ $p->id }}
                        </span>
                    </div>

                    <!-- Product Icon -->
                    <div style="width: 60px; height: 60px; background: linear-gradient(135deg, rgba(201, 166, 70, 0.2) 0%, rgba(201, 166, 70, 0.1) 100%); border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 28px; margin-bottom: 16px;">
                        📦
                    </div>

                    <!-- Product Info -->
                    <h3 style="margin: 0 0 8px 0; font-size: 18px; color: #fff;">{{ $p->nama_produk }}</h3>
                    <p class="muted" style="margin: 0 0 12px 0; font-size: 13px; line-height: 1.5; min-height: 40px;">
                        {{ $p->deskripsi ? Str::limit($p->deskripsi, 80) : 'Tidak ada deskripsi' }}
                    </p>

                    <!-- Price -->
                    <div style="background: rgba(201, 166, 70, 0.1); padding: 12px; border-radius: 8px; margin-bottom: 16px;">
                        <p class="muted" style="margin: 0 0 4px 0; font-size: 11px; text-transform: uppercase;">Harga</p>
                        <h3 style="margin: 0; color: #c9a646; font-size: 22px;">Rp {{ number_format($p->harga, 0, ',', '.') }}</h3>
                    </div>

                    <!-- Actions -->
                    <div class="actions" style="gap: 8px;">
                        <a href="{{ route('products.edit', $p->id) }}" class="btn btn-ghost" style="flex: 1;">✏️ Edit</a>
                        <form action="{{ route('products.destroy', $p->id) }}" method="POST" style="flex: 1;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" style="width: 100%;" onclick="return confirm('Yakin hapus {{ $p->nama_produk }}?')">🗑️ Hapus</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <!-- Empty State -->
        <div class="card" style="text-align: center; padding: 48px 24px;">
            <div style="font-size: 64px; margin-bottom: 16px; opacity: 0.3;">📦</div>
            <h3 style="margin: 0 0 8px 0;">Belum Ada Produk</h3>
            <p class="muted" style="margin: 0 0 24px 0;">Mulai tambahkan produk pertama Anda</p>
            <a href="{{ route('products.create') }}" class="btn btn-primary">+ Tambah Produk Pertama</a>
        </div>
    @endif

    <style>
        .card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 24px rgba(201, 166, 70, 0.2);
            border-color: rgba(201, 166, 70, 0.4) !important;
        }
    </style>
@endsection
