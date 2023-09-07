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
        Schema::create('cartade_recomendacions', function (Blueprint $table) {
            $table->id();
            $table->string('encabezado',15);
            $table->string('referente',50);
            $table->string('cargoYTareasRealizadas',300);
            $table->string('contacto',8);
            $table->binary('firma');
            $table->bigInteger('autoridadAcademica_id')->unsigned();
            $table->bigInteger('estudiante_id')->unsigned();
            $table->foreign('autoridadAcademica_id')->references('id')->on('autoridad_academicas')->onDelete("cascade");
            $table->foreign('estudiante_id')->references('id')->on('estudiantes')->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cartade_recomendacions');
    }
};
