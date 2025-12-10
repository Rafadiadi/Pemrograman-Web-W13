<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Product;
use App\Models\Toko;
use App\Models\Stok;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
        ]);

        $toko1 = Toko::create([
            'nama_toko' => 'Toko Sejahtera',
            'alamat' => 'Jl. Merdeka No. 123, Jakarta',
            'telepon' => '021-1234567',
            'email' => 'sejahtera@example.com',
        ]);

        $toko2 = Toko::create([
            'nama_toko' => 'Toko Makmur',
            'alamat' => 'Jl. Sudirman No. 456, Bandung',
            'telepon' => '022-7654321',
            'email' => 'makmur@example.com',
        ]);

        $toko3 = Toko::create([
            'nama_toko' => 'Toko Jaya',
            'alamat' => 'Jl. Pahlawan No. 789, Surabaya',
            'telepon' => '031-9876543',
            'email' => 'jaya@example.com',
        ]);

        $product1 = Product::create([
            'nama_produk' => 'Laptop ASUS ROG',
            'deskripsi' => 'Laptop gaming dengan spesifikasi tinggi',
            'harga' => 15000000,
            'kategori' => 'Elektronik',
        ]);

        $product2 = Product::create([
            'nama_produk' => 'Mouse Logitech',
            'deskripsi' => 'Mouse wireless dengan sensor presisi',
            'harga' => 350000,
            'kategori' => 'Elektronik',
        ]);

        $product3 = Product::create([
            'nama_produk' => 'Keyboard Mechanical',
            'deskripsi' => 'Keyboard mechanical RGB dengan switch blue',
            'harga' => 750000,
            'kategori' => 'Elektronik',
        ]);

        $product4 = Product::create([
            'nama_produk' => 'Monitor LG 24 inch',
            'deskripsi' => 'Monitor IPS Full HD',
            'harga' => 2500000,
            'kategori' => 'Elektronik',
        ]);

        $product5 = Product::create([
            'nama_produk' => 'Headset Gaming',
            'deskripsi' => 'Headset dengan surround sound 7.1',
            'harga' => 650000,
            'kategori' => 'Elektronik',
        ]);

        Stok::create(['product_id' => $product1->id, 'toko_id' => $toko1->id, 'jumlah' => 5]);
        Stok::create(['product_id' => $product1->id, 'toko_id' => $toko2->id, 'jumlah' => 3]);
        
        Stok::create(['product_id' => $product2->id, 'toko_id' => $toko1->id, 'jumlah' => 25]);
        Stok::create(['product_id' => $product2->id, 'toko_id' => $toko3->id, 'jumlah' => 20]);
        
        Stok::create(['product_id' => $product3->id, 'toko_id' => $toko2->id, 'jumlah' => 15]);
        Stok::create(['product_id' => $product3->id, 'toko_id' => $toko3->id, 'jumlah' => 10]);
        
        Stok::create(['product_id' => $product4->id, 'toko_id' => $toko1->id, 'jumlah' => 8]);
        Stok::create(['product_id' => $product4->id, 'toko_id' => $toko2->id, 'jumlah' => 6]);
        
        Stok::create(['product_id' => $product5->id, 'toko_id' => $toko1->id, 'jumlah' => 12]);
        Stok::create(['product_id' => $product5->id, 'toko_id' => $toko3->id, 'jumlah' => 18]);
    }
}
