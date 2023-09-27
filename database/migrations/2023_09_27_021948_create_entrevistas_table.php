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
            $table->engine="InnoDB";
            $table->bigIncrements('entrevistaId');
            $table->string('tituloEntrevista',100);
            $table->string('descripcionEntrevista',250);
            $table->date('FechaEntrevista');
            $table->time('horaInicio');
            $table->time('horaFinal');
            $table->boolean('Contratado')->default(0);
            $table->string('comentarioContratado', 300);
            $table->unsignedBigInteger('postulacion_id')->unsigned();
            $table->timestamps();
            $table->foreign('postulacion_id')->references('postulacionId')->on('postulacions')->onDelete('cascade');
            
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
