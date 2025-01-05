<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('rentals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_motor');
            $table->unsignedBigInteger('id_renter');
            $table->integer('durasi_sewa');
            $table->date('tgl_mulai');
            $table->date('tgl_selesai');
            $table->integer('total_harga');
            $table->string('status');
            $table->timestamps();
    
            $table->foreign('id_motor')->references('id')->on('motors')->onDelete('cascade');
            $table->foreign('id_renter')->references('id')->on('renters')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rentals');
    }
};
