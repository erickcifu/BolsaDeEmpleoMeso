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
            $table->bigIncrements('estudianteId');
            $table->string('nombre', 100);
            $table->string('apellidos', 100);
            $table->integer('carnet');
            $table->string('DPI',15);
            $table->string('correo', 100);
            $table->integer('numero_personal');
            $table->integer('numero_domiciliar');
            $table->string('curriculum', 300);
            $table->bigInteger('municipio_id')->unsigned();
            $table->bigInteger('carrera_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->timestamps();
            $table->foreign('municipio_id')->references('municipioId')->on('municipios')->onDelete(null);
            $table->foreign('carrera_id')->references('id')->on('carreras')->onDelete(null);
            $table->foreign('user_id')->references('id')->on('users')->onDelete("cascade");

        });
    }

    /**
     * Reverse the migrations.
     * 
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('estudiantes');
    }
};
