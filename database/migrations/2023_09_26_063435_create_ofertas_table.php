<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfertasTable extends Migration
{
    /**
     * Run the migrations.
     * 
     * @return void
     */
    public function up()
    {
        Schema::create('ofertas', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->bigIncrements('ofertaId');
            $table->string('nombrePuesto',200);
            $table->string('resumenPuesto',300);
            $table->string('responsabilidadesPuesto',300);
            $table->string('requisitosEducativos',200);
            $table->string('experienciaLaboral',300);
            $table->float('sueldoMax');
            $table->float('sueldoMinimo');
            $table->string('jornadaLaboral',20);
            $table->string('condicionesLaborales',300);
            $table->string('beneficios',300);
            $table->string('oportunidadesDesarrollo',300);
            $table->date('fechaMax');
            $table->string('imagenPuesto',250);
            $table->integer('cantVacantes');
            $table->string('modalidadTrabajo',15);
            $table->integer('edadRequerida');
            $table->string('generoRequerido',50);
            $table->string('comentarioCierre',300);
            $table->boolean('estadoOferta')->default(1);
            $table->unsignedBigInteger('empresa_id')->nullable();
            $table->unsignedBigInteger('facultad_id')->nullable();
            $table->foreign('empresa_id')
                  ->references('empresaId')->on('empresas')
                   ->onDelete(null);
            $table->foreign('facultad_id')
                  ->references('id')->on('facultads')
                   ->onDelete(null);
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
        Schema::dropIfExists('ofertas');
    }
};
