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
            $table->id();
            $table->string('nombre_empresa',200);
            $table->integer('nit');
            $table->string('RTU');
            $table->string('patenteDeComercio');
            $table->string('descripcion');
            $table->string('telefonoEmpresa');
            $table->string('correoEmpresa');
            $table->string('direccionEmpresa');
            $table->boolean('estadoEmpresa');
            $table->unsignedBigInteger('user_id')->unique();

            $table->timestamps();
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
        Schema::dropIfExists('empresas');
    }
};
