<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_produk',
        'deskripsi',
        'harga',
        'kategori',
    ];

    public function stok()
    {
        return $this->hasMany(Stok::class);
    }

    public function tokos()
    {
        return $this->belongsToMany(Toko::class, 'stok', 'product_id', 'toko_id')
                    ->withPivot('jumlah')
                    ->withTimestamps();
    }
}
