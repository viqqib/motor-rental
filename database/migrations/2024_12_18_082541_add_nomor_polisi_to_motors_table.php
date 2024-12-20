<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNomorPolisiToMotorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('motors', function (Blueprint $table) {
            $table->string('nomor_polisi')->nullable(); // Add nomor_polisi column
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('motors', function (Blueprint $table) {
            $table->dropColumn('nomor_polisi'); // Drop the nomor_polisi column if rolling back
        });
    }
}
