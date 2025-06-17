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
            $table->string('created')->nullable();
            $table->text('desc')->nullable();
            $table->string('creator')->nullable();
            $table->string('img_url')->nullable();
            $table->foreignId('museum_id')->constrained('museums')->onDelete('cascade');
            $table->foreignId('medium_id')->constrained('mediums')->onDelete('cascade');
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->timestamps();
        });
        /* CREATE TABLE arts (
            id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            title VARCHAR(255) NOT NULL,
            created VARCHAR(255),
            `desc` TEXT,
            creator VARCHAR(255),
            img_url VARCHAR(255),
            museum_id BIGINT UNSIGNED NOT NULL,
            medium_id BIGINT UNSIGNED NOT NULL,
            status ENUM('pending', 'approved', 'rejected') DEFAULT 'pending',
            created_at TIMESTAMP NULL DEFAULT NULL,
            updated_at TIMESTAMP NULL DEFAULT NULL,

            CONSTRAINT fk_arts_museum FOREIGN KEY (museum_id) REFERENCES museums(id) ON DELETE CASCADE,
            CONSTRAINT fk_arts_medium FOREIGN KEY (medium_id) REFERENCES mediums(id) ON DELETE CASCADE
        ); */
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('arts');
    }
};
