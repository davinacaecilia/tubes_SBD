<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('arts', function (Blueprint $table) {
            // Mengubah kolom status menjadi VARCHAR dengan panjang 20 karakter
            // dan menambahkan nilai default 'pending'
            $table->string('status', 20)->default('pending')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('arts', function (Blueprint $table) {
            // Kode untuk mengembalikan jika diperlukan (opsional)
        });
    }
};
