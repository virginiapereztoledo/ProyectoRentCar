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
    Schema::table('alquiler', function (Blueprint $table) {
        $table->timestamp('fechaDevolucion')->nullable();
    });
}

public function down()
{
    Schema::table('alquiler', function (Blueprint $table) {
        $table->dropColumn('fechaDevolucion');
    });
}

};
