<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('motors', function (Blueprint $table) {
            $table->year('tahun')->after('merek'); // Add 'tahun' column after 'merek'
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('motors', function (Blueprint $table) {
            $table->dropColumn('tahun'); // Remove 'tahun' column if rolled back
        });
    }
};
