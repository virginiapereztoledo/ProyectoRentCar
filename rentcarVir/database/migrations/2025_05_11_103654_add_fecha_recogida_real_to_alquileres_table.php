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
        $table->dateTime('fechaRecogidaReal')->nullable();  // Para guardar la fecha y hora de recogida real
    });
}

public function down()
{
    Schema::table('alquiler', function (Blueprint $table) {
        $table->dropColumn('fechaRecogidaReal');
    });
}

};
