<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExperienciasTable extends Migration
{
    /**
     * Run the migrations.
     * 
     * @return void
     */
    public function up()
    {
        Schema::create('experiencias', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->bigIncrements('experienciaId');
            $table->date('inicioExperiencia');
            $table->date('finExperiencia');
            $table->string('puestoTrabajo',200);
            $table->string('lugarTrabajo',300);
            $table->string('descripcionLaboral',300);
            $table->unsignedBigInteger('cv_id')->unsigned();
            $table->timestamps();
            $table->foreign('cv_id')->references('cvId')->on('cvs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     * 
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('experiencias');
    }
};
