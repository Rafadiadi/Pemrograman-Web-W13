@extends('layouts.luxe')

@php use Illuminate\Support\Str; @endphp

@section('title', 'Toko')

@section('content')
    <!-- Header Section -->
    <div class="card" style="background: linear-gradient(135deg, rgba(125, 209, 255, 0.1) 0%, rgba(125, 209, 255, 0.05) 100%); border-left: 4px solid #7dd1ff;">
        <div style="display:flex; justify-content: space-between; align-items: center; gap: 12px; flex-wrap: wrap;">
            <div>
                <h2 style="margin:0; color: #7dd1ff;">🏬 Daftar Toko</h2>
                <p class="muted" style="margin:4px 0 0;">Kelola {{ $tokos->count() }} toko dalam sistem</p>
            </div>
            <a href="{{ route('toko.create') }}" class="btn btn-primary" style="box-shadow: 0 4px 12px rgba(125, 209, 255, 0.3);">+ Tambah Toko</a>
        </div>
    </div>

    @if($tokos->count() > 0)
        <!-- Grid View -->
        <div class="grid" style="grid-template-columns: repeat(auto-fill, minmax(350px, 1fr)); gap: 20px; margin-bottom: 24px;">
            @foreach($tokos as $toko)
                <div class="card" style="position: relative; border: 1px solid rgba(125, 209, 255, 0.2); transition: all 0.3s ease;">
                    <!-- Toko Badge -->
                    <div style="position: absolute; top: 12px; right: 12px;">
                        <span class="badge" style="background: rgba(125, 209, 255, 0.2); color: #7dd1ff; font-size: 11px;">
                            #{{ $toko->id }}
                        </span>
                    </div>

                    <!-- Toko Icon -->
                    <div style="width: 60px; height: 60px; background: linear-gradient(135deg, rgba(125, 209, 255, 0.2) 0%, rgba(125, 209, 255, 0.1) 100%); border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 28px; margin-bottom: 16px;">
                        🏪
                    </div>

                    <!-- Toko Info -->
                    <h3 style="margin: 0 0 12px 0; font-size: 20px; color: #fff;">{{ $toko->nama_toko }}</h3>
                    
                    <!-- Details -->
                    <div style="background: rgba(125, 209, 255, 0.05); padding: 12px; border-radius: 8px; margin-bottom: 16px; min-height: 120px;">
                        <div style="margin-bottom: 8px;">
                            <p class="muted" style="margin: 0; font-size: 11px; text-transform: uppercase;">📍 Alamat</p>
                            <p style="margin: 4px 0 0 0; font-size: 13px; line-height: 1.4;">{{ Str::limit($toko->alamat, 60) }}</p>
                        </div>
                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 8px; margin-top: 12px;">
                            <div>
                                <p class="muted" style="margin: 0; font-size: 11px;">📞 Telepon</p>
                                <p style="margin: 2px 0 0 0; font-size: 13px;">{{ $toko->telepon }}</p>
                            </div>
                            <div>
                                <p class="muted" style="margin: 0; font-size: 11px;">✉️ Email</p>
                                <p style="margin: 2px 0 0 0; font-size: 13px;">{{ $toko->email ? Str::limit($toko->email, 20) : '-' }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="actions" style="gap: 8px;">
                        <a href="{{ route('toko.show', $toko->id) }}" class="btn btn-ghost" style="flex: 1;">👁️ Lihat</a>
                        <a href="{{ route('toko.edit', $toko->id) }}" class="btn btn-ghost" style="flex: 1;">✏️ Edit</a>
                        <form action="{{ route('toko.destroy', $toko->id) }}" method="POST" style="flex: 0.5;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" style="width: 100%; padding: 8px;" onclick="return confirm('Yakin hapus {{ $toko->nama_toko }}?')" title="Hapus">🗑️</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        @if($tokos->hasPages())
            <div class="card" style="background: rgba(125, 209, 255, 0.05);">
                {{ $tokos->links() }}
            </div>
        @endif
    @else
        <!-- Empty State -->
        <div class="card" style="text-align: center; padding: 48px 24px;">
            <div style="font-size: 64px; margin-bottom: 16px; opacity: 0.3;">🏪</div>
            <h3 style="margin: 0 0 8px 0;">Belum Ada Toko</h3>
            <p class="muted" style="margin: 0 0 24px 0;">Mulai tambahkan toko pertama Anda</p>
            <a href="{{ route('toko.create') }}" class="btn btn-primary">+ Tambah Toko Pertama</a>
        </div>
    @endif

    <style>
        .card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 24px rgba(125, 209, 255, 0.2);
            border-color: rgba(125, 209, 255, 0.4) !important;
        }
    </style>
@endsection
