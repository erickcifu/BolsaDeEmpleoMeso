<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     * 
     * @return void
     */
    public function up()
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->bigIncrements('empresaId');
            $table->string('logo', 250);
            $table->string('nombreEmpresa', 150);
            $table->integer('nit');
            $table->string('rtu', 250) ;
            $table->string('patenteComercio', 250);
            $table->string('descripcionEmpresa', 250);
            $table->integer('telefonoEmpresa');
            $table->string('correoEmpresa', 100);
            $table->string('direccionEmpresa', 250);
            $table->string('encargadoEmpresa', 250);
            $table->integer('telefonoEncargado');
            $table->boolean('estadoEmpresa')->default(1);
            $table->string('estadoSolicitud', 50);
            $table->unsignedBigInteger('user_id')->unique();
            $table->unsignedBigInteger('residencia_id')->unique();
            $table->foreign('residencia_id')->references('municipioId')->on('municipios')->onDelete(null);
            $table->foreign('user_id')->references('id')->on('users')->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     * 
     * @return voids
     */
    public function down()
    {
        Schema::dropIfExists('empresas');
    }
};
