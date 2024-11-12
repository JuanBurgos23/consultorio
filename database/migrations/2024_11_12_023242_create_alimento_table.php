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
        Schema::create('alimento', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('caloria');
            $table->string('carbohidrato');
            $table->string('proteina');
            $table->string('grasa');
            $table->string('fibra');
            $table->string('vitamina');
            $table->string('potacio');
            $table->unsignedBigInteger('id_tipoAlimento');
            $table->foreign('id_tipoAlimento')->references('id')->on('tipo_alimento');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alimento');
    }
};
