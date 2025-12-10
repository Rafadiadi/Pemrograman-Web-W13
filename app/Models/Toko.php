<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Toko extends Model
{
    use HasFactory;

    protected $table = 'toko';

    protected $fillable = [
        'nama_toko',
        'alamat',
        'telepon',
        'email',
    ];

    public function stok()
    {
        return $this->hasMany(Stok::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'stok', 'toko_id', 'product_id')
                    ->withPivot('jumlah')
                    ->withTimestamps();
    }
}
