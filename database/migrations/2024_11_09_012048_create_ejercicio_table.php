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
        Schema::create('ejercicio', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('descripcion');
            $table->unsignedBigInteger('id_tipoEjercicio');
            $table->unsignedBigInteger('id_rutina');
            $table->unsignedBigInteger('id_dia');
            $table->foreign('id_tipoEjercicio')->references('id')->on('tipo_ejercicio');
            $table->foreign('id_rutina')->references('id')->on('rutina');
            $table->foreign('id_dia')->references('id')->on('dia');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ejercicio');
    }
};
