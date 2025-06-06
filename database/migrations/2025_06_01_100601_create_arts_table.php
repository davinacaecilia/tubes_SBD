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
        Schema::create('arts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->year('created')->nullable();
            $table->text('desc')->nullable();
            $table->string('creator')->nullable();
            $table->string('img_url')->nullable();
            $table->foreignId('museum_id')->constrained()->onDelete('cascade');
            $table->foreignId('medium_id')->constrained('mediums')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('arts');
    }
};
