<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stok extends Model
{
    use HasFactory;

    protected $table = 'stok';

    protected $fillable = [
        'product_id',
        'toko_id',
        'jumlah',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function toko()
    {
        return $this->belongsTo(Toko::class);
    }
}
