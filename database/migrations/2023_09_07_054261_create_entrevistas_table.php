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
        Schema::create('entrevistas', function (Blueprint $table) {
            $table->id();
            $table->string('tituloEntrevista');
            $table->string('descripcionEntrevista');
            $table->date('FechaEntrevista');
            $table->time('hora_inicio');
            $table->time('hora_final');
            $table->boolean('Contratado');
            $table->string('comentarioContratado');

            $table->unsignedBigInteger('postulacion_id')->unsigned();

           $table->foreign('postulacion_id')
                  ->references('id')->on('postulacions')
                  ->onDelete('cascade');
           
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entrevistas');
    }
};
