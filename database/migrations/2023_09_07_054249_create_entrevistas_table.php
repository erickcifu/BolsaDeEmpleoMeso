<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntrevistasTable extends Migration
{
    /**
     * Run the migrations.
     * 
     * @return void
     */
    public function up()
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
            $table->unsignedBigInteger('postulacion_id')->nullable();

           $table->foreign('postulacion_id')
                  ->references('id')->on('postulaciones')
                  ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     * 
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entrevistas');
    }
};
