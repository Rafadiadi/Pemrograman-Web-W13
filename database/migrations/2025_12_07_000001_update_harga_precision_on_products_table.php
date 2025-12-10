<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // Allow larger price values
        DB::statement('ALTER TABLE products MODIFY harga DECIMAL(15,2)');
    }

    public function down(): void
    {
        // Revert to previous precision
        DB::statement('ALTER TABLE products MODIFY harga DECIMAL(10,2)');
    }
};
