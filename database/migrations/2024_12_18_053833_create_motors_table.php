<?php
// database/migrations/xxxx_xx_xx_xxxxxx_create_motors_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMotorsTable extends Migration
{
    public function up()
    {
        Schema::create('motors', function (Blueprint $table) {
            $table->id(); // Auto-incrementing ID
            $table->string('tipe'); // Type of motor
            $table->string('merek'); // Brand of motor
            $table->string('kategori'); // Category (e.g., Matic)
            $table->string('transmisi'); // Transmission type
            $table->string('kondisi'); // Condition description
            $table->string('kapasitas'); // Capacity
            $table->integer('cc'); // Engine size (CC)
            $table->string('kecepatan'); // Maximum speed
            $table->text('deskripsi'); // Description of the motor
            $table->integer('harga_jam'); // Hourly rental price
            $table->enum('status', ['tersedia', 'tidak tersedia']); // Availability status
            $table->timestamps(); // Created at and updated at timestamps
        });
    }

    public function down()
    {
        Schema::dropIfExists('motors');
    }
}
