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
        Schema::create('favorites', function (Blueprint $table) {
            $table->id();
            // Kolom untuk menghubungkan ke user yang memberi favorit
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            // --- PERBAIKAN DI SINI ---
            // Menggunakan nama standar Laravel untuk polymorphic relationship
            // Ini akan menyimpan ID dari item (misal: Art ID 5)
            $table->morphs('favorable');

            // Baris di atas adalah shortcut untuk:
            // $table->unsignedBigInteger('favorable_id');
            // $table->string('favorable_type');
            // Ini akan menyimpan nama model dari item (misal: 'App\Models\Art')

            // Menambahkan created_at dan updated_at
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('favorites');
    }
};
