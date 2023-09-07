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
        Schema::create('autoridad_academicas', function (Blueprint $table) {
            $table->id();
            $table->string('nombreAutoridad',60);
            $table->string('apellidosAutoridad',50);
            $table->boolean('estado');
            $table->bigInteger('postulacion_id')->unsigned();
            $table->bigInteger('carrera_id')->unsigned();
            $table->foreign('postulacion_id')->references('id')->on('postulacions')->onDelete("cascade");
            $table->foreign('carrera_id')->references('id')->on('carreras')->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('autoridad_academicas');
    }
};
