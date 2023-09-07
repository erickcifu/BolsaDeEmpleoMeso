<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstudiantesTable extends Migration
{
    /**
     * Run the migrations.
     * 
     * @return void
     */
    public function up()
    {
        Schema::create('estudiantes', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->string('apellidos');
            $table->string('carnet');
            $table->string('DPI');
            $table->string('correo');
            $table->string('numero_personal');
            $table->string('numero_domiciliar');
            $table->string('curriculum',100);
            $table->bigInteger('municipio_id')->unsigned();
            $table->bigInteger('carrera_id')->unsigned();
            $table->unsignedBigInteger('user_id')->unique();
            $table->timestamps();
            $table->foreign('municipio_id')->references('id')->on('municipios')->onDelete("cascade");
            $table->foreign('carrera_id')->references('id')->on('carreras')->onDelete("cascade");
            $table->foreign('user_id')->references('id')->on('users')->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     * 
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estudiantes');
    }
};
