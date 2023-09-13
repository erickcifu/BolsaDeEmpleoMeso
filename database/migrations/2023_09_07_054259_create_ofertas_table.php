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
            $table->id();
            $table->string('descripcion',200);
            $table->string('puesto',100);
            $table->string('imagen',100);
            $table->float('sueldoMinimo');
            $table->date('fecha');
            $table->integer('puestoVacante');
            $table->string('tipoContratacion',100);
            $table->integer('edadRequerida');
            $table->string('genero',50);
            $table->string('perfil');
            $table->float('sueldoMax');

           $table->unsignedBigInteger('empresa_id')->nullable();

           $table->foreign('empresa_id')
                  ->references('id')->on('empresas')
                   ->onDelete('set null');
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
