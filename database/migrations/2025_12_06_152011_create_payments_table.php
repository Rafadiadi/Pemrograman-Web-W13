<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained()->onDelete('cascade');
            $table->decimal('jumlah_bayar', 15, 2);
            $table->enum('metode_pembayaran', ['cash', 'transfer', 'ewallet', 'kartu_kredit']);
            $table->enum('status_pembayaran', ['pending', 'lunas', 'gagal'])->default('pending');
            $table->timestamp('tanggal_bayar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
