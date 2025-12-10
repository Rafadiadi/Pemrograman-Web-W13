<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'jumlah_bayar',
        'metode_pembayaran',
        'status_pembayaran',
        'tanggal_bayar',
    ];

    protected $casts = [
        'tanggal_bayar' => 'datetime',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
