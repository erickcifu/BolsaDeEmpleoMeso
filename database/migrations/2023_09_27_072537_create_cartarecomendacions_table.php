<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartaRecomendacionsTable extends Migration
{
    /**
     * Run the migrations.
     * 
     * @return void
     */
    public function up()
    {
        Schema::create('cartarecomendacions', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->bigIncrements('cartaId');
            $table->date('fechaCarta');
            $table->string('cargoYTareasRealizadas',300);
            $table->string('telefonoAutoridad',10);
            $table->string('firmaAutoridad');
            $table->bigInteger('autoridadAcademica_id')->unsigned();
            $table->bigInteger('estudiante_id')->unsigned();
            $table->foreign('autoridadacademica_id')->references('autoridadId')->on('autoridadacademicas')->onDelete(null);
            $table->foreign('estudiante_id')->references('estudianteId')->on('estudiantes')->onDelete("cascade");
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
        Schema::dropIfExists('cartarecomendacions');
    }
};
