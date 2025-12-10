@extends('layouts.luxe')

@section('title', 'Edit Toko')

@section('content')
    <!-- Breadcrumb -->
    <div style="margin-bottom: 16px;">
        <a href="{{ route('toko.index') }}" class="muted" style="text-decoration: none; font-size: 14px;">← Kembali ke Daftar Toko</a>
    </div>
    <div class="card" style="max-width: 720px; margin: 0 auto;">
        <h2 style="margin-top:0;">Edit Toko</h2>
        <p class="muted" style="margin-bottom: 18px;">Perbarui informasi toko.</p>

        <form action="{{ route('toko.update', $toko->id) }}" method="POST" class="fields">
            @csrf
            @method('PUT')
            <div>
                <label for="nama_toko">Nama Toko *</label>
                <input type="text" id="nama_toko" name="nama_toko" value="{{ old('nama_toko', $toko->nama_toko) }}" required>
                @error('nama_toko')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="alamat">Alamat *</label>
                <textarea id="alamat" name="alamat" rows="3" required>{{ old('alamat', $toko->alamat) }}</textarea>
                @error('alamat')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="telepon">Telepon *</label>
                <input type="text" id="telepon" name="telepon" value="{{ old('telepon', $toko->telepon) }}" required>
                @error('telepon')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email', $toko->email) }}">
                @error('email')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="actions" style="justify-content:flex-end;">
                <a href="{{ route('toko.index') }}" class="btn btn-ghost">Batal</a>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
@endsection
