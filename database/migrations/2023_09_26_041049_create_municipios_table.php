<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMunicipiosTable extends Migration
{
    /**
     * Run the migrations.
     * 
     * @return void
     */
    public function up()
    {
        Schema::create('municipios', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->bigIncrements('municipioId');
            $table->string('nombreMunicipio');
            $table->bigInteger('departamento_id')->unsigned();
            $table->foreign('departamento_id')->references('departamentoId')->on('departamentos')->onDelete("cascade");
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
        Schema::dropIfExists('municipios');
    }
};
