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
        Schema::create('homepage_contents', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('section')->unique(); // Section identifier (e.g., 'hero', 'about', etc.)
            $table->string('heading')->nullable();
            $table->text('content')->nullable(); // Section content or description
            $table->string('image')->nullable(); // Optional image path
            $table->timestamps(); // created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('homepage_contents');
    }
};
