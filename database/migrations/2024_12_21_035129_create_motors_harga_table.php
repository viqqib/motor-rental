<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMotorsHargaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('motors_harga', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_motor'); // Foreign key to motors.id
            $table->integer('harga_12_jam');
            $table->integer('harga_24_jam');
            $table->integer('harga_1_minggu');
            $table->integer('harga_1_bulan');
            $table->timestamps();

            // Add foreign key constraint
            $table->foreign('id_motor')->references('id')->on('motors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('motors_harga');
    }
}
