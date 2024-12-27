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
        Schema::create('website_info', function (Blueprint $table) {
            $table->id();
            $table->string('name', 24)->nullable();
            $table->string('tagline', 100)->nullable();
            $table->string('email')->nullable();
            $table->string('phone_number', 15)->nullable();
            $table->string('address',100)->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('website_info');
    }
};

