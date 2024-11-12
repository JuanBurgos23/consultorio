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
        Schema::create('detalle_dieta', function (Blueprint $table) {
            $table->unsignedBigInteger('id_alimento');
            $table->unsignedBigInteger('id_periodo');
            $table->id(); $table->string('nombre');
            $table->string('cantidad');
            $table->unsignedBigInteger('id_dieta');
            $table->unsignedBigInteger('id_dia');
            $table->foreign('id_dieta')->references('id')->on('dieta');
            $table->foreign('id_alimento')->references('id')->on('alimento');
            $table->foreign('id_periodo')->references('id_periodo')->on('horario');
            $table->foreign('id_dia')->references('id_dia')->on('horario');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_dieta');
    }
};
