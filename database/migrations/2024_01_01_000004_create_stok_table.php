<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('stok', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade');
            $table->foreignId('toko_id')->constrained('toko')->onDelete('cascade');
            $table->integer('jumlah')->default(0);
            $table->timestamps();
            
            $table->unique(['product_id', 'toko_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('stok');
    }
};
